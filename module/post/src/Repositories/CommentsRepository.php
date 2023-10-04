<?php

namespace Post\Repositories;

use Post\Models\Comments;
use Prettus\Repository\Eloquent\BaseRepository;

class CommentsRepository extends BaseRepository
{
    public function model()
    {
        return Comments::class;
    }
}
