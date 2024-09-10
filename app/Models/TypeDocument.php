<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

/**
 * Class TypeDocument
 * @package App\Models
 * @version December 5, 2021, 4:21 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $documents
 * @property string $nom
 * @property integer $user_created
 * @property integer $user_modified
 */
class TypeDocument extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'type_documents';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
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
        'user_created' => 'nullable',
        'user_modified' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documents()
    {
        return $this->hasMany(\App\Models\Document::class, 'type_document_id');
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
