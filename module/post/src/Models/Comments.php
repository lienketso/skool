<?php

namespace Post\Models;

use Groups\Models\LikeComment;
use Illuminate\Database\Eloquent\Model;
use Users\Models\Users;

class Comments extends Model
{
    protected $table ='comments';
    protected $fillable = ['post_id','user_id','parent','content','liked','status'];

    public function getUser(){
        return $this->belongsTo(Users::class,'user_id','id');
    }

    public function childs(){
        return $this->hasMany(Comments::class, 'parent', 'id');
    }

    public function likesComment(){
        return $this->belongsToMany(Users::class,LikeComment::class,'comment_id','user_id');
    }

}
