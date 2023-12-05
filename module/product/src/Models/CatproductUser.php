<?php

namespace Product\Models;

use Illuminate\Database\Eloquent\Model;

class CatproductUser extends Model
{
    protected $table="catproduct_user";
    protected $fillable = ['cat_id','user_id'];
}
