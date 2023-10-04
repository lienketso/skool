<?php


namespace Product\Models;
use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{
    protected $table = 'product';
    protected $fillable = ['id','product_id','enable_color','colors','enable_size','size'];
}
