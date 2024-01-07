<?php

namespace Project\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Project\Models\Banks;

class BankRepository extends BaseRepository
{
    public function model()
    {
        return Banks::class;
    }
}
