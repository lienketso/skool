<?php

namespace Groups\Repositories;

use Groups\Models\Groups;
use Prettus\Repository\Eloquent\BaseRepository;

class GroupsRepository extends BaseRepository
{
    public function model()
    {
        return Groups::class;
    }
}
