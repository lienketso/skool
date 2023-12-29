<?php
namespace Groups\Models;
use Illuminate\Database\Eloquent\Model;
use Users\Models\Users;

class Groups extends Model
{
    protected $table = 'groups';
    protected $fillable = ['admin_id','name','slug','group_type','bio','thumbnail','banner','status','is_home'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value,'-','');
    }

    public function users(){
        return $this->belongsToMany(Users::class,GroupUser::class,'group_id', 'user_id');
    }


}
