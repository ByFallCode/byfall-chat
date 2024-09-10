<?php

namespace App\Models;

use App\Permissions\HasPermissionsTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

/**
 * Class Role
 * @package App\Models
 * @version April 17, 2022, 12:15 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $permissions
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $name
 * @property string $slug
 */
class Role extends Model
{
    //use SoftDeletes;

    use HasFactory, HasPermissionsTrait;

    public $table = 'roles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function permissions()
    {
        return $this->belongsToMany(\App\Models\Permission::class, 'roles_permissions');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'users_roles');
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
