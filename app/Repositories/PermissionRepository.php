<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\BaseRepository;

/**
 * Class PermissionRepository
 * @package App\Repositories
 * @version April 17, 2022, 12:11 pm UTC
*/

class PermissionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Permission::class;
    }
}
