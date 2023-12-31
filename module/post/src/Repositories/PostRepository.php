<?php


namespace Post\Repositories;


use Post\Models\Post;
use Prettus\Repository\Eloquent\BaseRepository;

class PostRepository extends BaseRepository
{
    public function model()
    {
        return Post::class;
    }

    public function getSinglePost($slug){
        $post = $this->findWhere(['slug'=>$slug])->first();
        return $post;
    }

    public function getPageFoot(){
        $pageFoot = $this->scopeQuery(function($e){
            return $e->orderBy('created_at','desc')->where('lang_code',session('lang'))
                ->where('status','active')->where('display',1)->where('post_type','page')->get();
        })->limit(5);
        return $pageFoot;
    }

    public function getLatestPost(){
        $latest = $this->scopeQuery(function($e){
            return $e->orderBy('created_at','desc')->where('post_type','blog')
                ->where('lang_code',session('lang'));
        })->limit(5);
        return $latest;
    }

}
