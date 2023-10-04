<?php


namespace Category\Models;


use Illuminate\Database\Eloquent\Model;
use Post\Models\Post;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name','slug','parent','description','thumbnail','sort_order','lang_code','status','meta_title','meta_desc','display'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value,'-','');
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent', 'id')->orderBy('sort_order','asc');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    public function postCat(){
        return $this->hasMany(Post::class,'category')
            ->orderBy('created_at','desc')
            ->where('status','active');
    }

}
