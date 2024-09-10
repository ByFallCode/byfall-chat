<?php

namespace App\Repositories;

use App\Models\TypeDocument;
use App\Repositories\BaseRepository;

/**
 * Class TypeDocumentRepository
 * @package App\Repositories
 * @version December 5, 2021, 4:21 pm UTC
*/

class TypeDocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'user_created',
        'user_modified'
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
        return TypeDocument::class;
    }
}
