<?php

namespace App\Repositories;

use App\Models\Document;
use App\Repositories\BaseRepository;

/**
 * Class DocumentRepository
 * @package App\Repositories
 * @version December 5, 2021, 4:22 pm UTC
*/

class DocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'type_document_id',
        'date',
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
        return Document::class;
    }
}
