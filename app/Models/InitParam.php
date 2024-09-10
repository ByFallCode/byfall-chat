<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InitParam
 * @package App\Models
 * @version April 7, 2021, 8:57 pm UTC
 *
 * @property string $name
 * @property string $logo
 * @property string $adresse
 * @property string $email
 * @property string $siteweb
 * @property string $phone
 */
class InitParam extends Model
{
    use SoftDeletes;

    public $table = 'init_params';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'logo',
        'adresse',
        'email',
        'siteweb',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'logo' => 'string',
        'adresse' => 'string',
        'email' => 'string',
        'siteweb' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'adresse' => 'required|string|max:255',
        'email' => 'required|string|max:100',
        'siteweb' => 'required|string|max:100',
        'phone' => 'nullable|string|max:15',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
