<?php


namespace Product\Models;


use Company\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Users\Models\Users;

class Product extends Model
{
    protected $table = 'product';
   protected $fillable = ['name','slug','cat_id','factory_id','age','chapter','price','disprice','discount','description','content','product_meta','meta_desc','meta_title','thumbnail','display','main_display','count_view','user_post'
    ,'user_edit','status','meta_keyword','sku','freeship','lapdat','thuoctinh','lang_code'];


    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value,'-','');
    }
    public function setPriceAttribute($value){
        $this->attributes['price'] = str_replace(',','',$value);
    }
    public function setDispriceAttribute($value){
        $this->attributes['disprice'] = str_replace(',','',$value);
    }

    public function getCompany(){
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function getCompanyName(){
        $com = $this->getCompany()->first();
        if (!empty($com)) {
            return $com->name;
        } else {
            echo '<span style="color:#c00">Chưa chọn công ty</span>';
        }
    }

    public function getUserPost(){
        return $this->belongsTo(Users::class,'user_post','id');
    }

    public function getUserEdit(){
        return $this->belongsTo(Users::class,'user_edit','id');
    }

    public function category(){
        return $this->belongsTo(Catproduct::class,'cat_id','id');
    }

    public function getCategory()
    {
        $cat = $this->category()->first();
        if (!empty($cat)) {
            return $cat->name;
        } else {
            echo '<span style="color:#c00">Chưa chọn danh mục</span>';
        }
    }

    public function factory(){
        return $this->belongsTo(Factory::class,'factory_id','id');
    }
    public function getFactory(){
        $fac = $this->factory()->first();
        if (!empty($fac)) {
            return $fac->name;
        } else {
            echo '<span style="color:#c00">Công ty</span>';
        }
    }



}
