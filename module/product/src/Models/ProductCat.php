<?php

namespace Product\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCat extends Model
{
    protected $table='catproduct_product';
    protected $fillable = ['product_id','catproduct_id'];
}
