<?php

namespace Groups\Models;

use Illuminate\Database\Eloquent\Model;

class CatPercent extends Model
{
    protected $table = 'cat_percent';
    protected $fillable = ['user_id','cat_id','group_id','mark_percent'];
}
