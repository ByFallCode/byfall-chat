<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

/**
 * Class Document
 * @package App\Models
 * @version December 5, 2021, 4:22 pm UTC
 *
 * @property \App\Models\TypeDocument $typeDocument
 * @property string $nom
 * @property integer $type_document_id
 * @property string|\Carbon\Carbon $date
 * @property integer $user_created
 * @property integer $user_modified
 */
class Document extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'documents';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'type_document_id',
        'date',
        'user_created',
        'user_modified'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'type_document_id' => 'integer',
        'date' => 'datetime',
        'user_created' => 'integer',
        'user_modified' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|string|max:100',
        'fichier' => 'required',
        'type_document_id' => 'required',
        'user_created' => 'nullable',
        'user_modified' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeDocument()
    {
        return $this->belongsTo(\App\Models\TypeDocument::class, 'type_document_id');
    }

    public function created_by(){
        return $this->belongsTo(User::class,'user_created');
    }

    public function updated_by(){
        return $this->belongsTo(User::class,'user_modified');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($entity)
        {
            $entity->user_created = Auth::user()->id ?? null;
            $entity->user_modified = Auth::user()->id ?? null;
        });

        static::updating(function($entity)
        {
            $entity->user_modified = Auth::user()->id ?? null;
        });
    }
}
