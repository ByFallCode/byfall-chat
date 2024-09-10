<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class Chat
 * @package App\Models
 * @version May 6, 2021, 2:04 am UTC
 *
 * @property string $title
 * @property string $message
 * @property string|\Carbon\Carbon $date
 * @property integer $user_created
 * @property integer $user_modified
 */
class Chat extends Model
{
    use SoftDeletes;

    public $table = 'chats';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'message',
        'isDirect',
        'attachment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'message' => 'string',
        'attachment' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:150',
        'message' => 'required|string',
    ];

    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'chats_users');
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

        static::creating(function($category)
        {
            $category->user_created = Auth::user()->id ?? null;
            $category->user_modified = Auth::user()->id ?? null;
        });

        static::updating(function($category)
        {
            $category->user_modified = Auth::user()->id ?? null;
        });
    }

}
