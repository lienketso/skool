<?php


namespace Faq\Repositories;


use Faq\Models\Faq;
use Prettus\Repository\Eloquent\BaseRepository;


class FaqRepository extends BaseRepository
{
    public function model()
    {
        return Faq::class;
    }
}
