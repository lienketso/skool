<?php

namespace Groups\Models;

use Illuminate\Database\Eloquent\Model;

class LikeUsers extends Model
{
    protected $table='likes_users';
    protected $fillable = ['user_id','post_id'];
}
