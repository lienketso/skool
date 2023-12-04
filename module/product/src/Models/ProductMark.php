<?php

namespace Product\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMark extends Model
{
    protected $table ='product_mark';
    protected $fillable = ['product_id','user_id','cat_id'];
}
