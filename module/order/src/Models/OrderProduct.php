<?php


namespace Order\Models;


use Illuminate\Database\Eloquent\Model;
use Product\Models\Product;
use Product\Models\Sku;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    protected $fillable = ['order_id','product_id','sku_id','qty','amount'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function skuname(){
    	return $this->belongsTo(Sku::class,'sku_id','id');
    }

}
