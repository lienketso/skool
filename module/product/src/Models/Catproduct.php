<?php


namespace Product\Models;


use Groups\Models\CatPercent;
use Groups\Models\Groups;
use Illuminate\Database\Eloquent\Model;

class Catproduct extends Model
{
    protected $table='catproduct';
    protected $fillable = ['name','slug','description','parent','thumbnail','background','meta_title','meta_desc','sort_order','display','status','lang_code','group_id'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value,'-','');
    }

    public function childs()
    {
        return $this->hasMany(Catproduct::class, 'parent', 'id')->orderBy('sort_order','asc');
    }
    public function childactive(){
        return $this->hasMany(Catproduct::class, 'parent', 'id')
            ->where('display',1)
            ->orderBy('sort_order','asc');
    }
    public function getProductCat(){
        return $this->hasMany(Product::class,'cat_id')
            ->where('status','active');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'catproduct_product','product_id','catproduct_id');
    }

    public function product(){
        return $this->hasMany(Product::class,'cat_id','id');
    }

    public function productPivot(){
        return $this->belongsToMany(Product::class,'catproduct_product','product_id')
            ->with('products')->withPivot(['product_id','catproduct_id']);
    }

    public function getGroup(){
        return $this->belongsTo(Groups::class,'group_id','id');
    }



}
