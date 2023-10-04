<?php


namespace Post\Models;


use Category\Models\Category;
use Groups\Models\LikeUsers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Media\Models\Media;
use Users\Models\Users;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['name','slug','address','price_value','end_date','category','description','content','thumbnail','banner','meta_desc','meta_title','meta_keyword','display','count_view','tags','user_post'
    ,'user_edit','status','post_type','lang_code','group_id','liked'];


    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value,'-','');
    }

    public function getUserPost(){
        return $this->belongsTo(Users::class,'user_post','id');
    }

    public function getUserEdit(){
        return $this->belongsTo(Users::class,'user_edit','id');
    }

    public function chuyenmuc(){
        return $this->belongsTo(Category::class,'category','id');
    }

    public function getCategory()
    {
        $cat = $this->chuyenmuc()->first();
        if (!empty($cat)) {
            return $cat->name;
        } else {
            echo '<span style="color:#c00">Chưa chọn danh mục</span>';
        }
    }

    public function media(){
        return $this->hasMany(Media::class,'table_id','id');
    }

    public function likesUser(){
        return $this->belongsToMany(Users::class,LikeUsers::class,'post_id','user_id');
    }

    public function getComment(){
        return $this->hasMany(Comments::class,'post_id','id');
    }

}
