<?php

namespace App\Repositories;

use App\Models\Chat;
use App\Repositories\BaseRepository;

/**
 * Class ChatRepository
 * @package App\Repositories
 * @version May 6, 2021, 2:04 am UTC
*/

class ChatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'message',
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
        return Chat::class;
    }
}
