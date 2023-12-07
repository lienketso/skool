<?php

namespace Users\Models;

use Acl\Models\Role;
use Acl\Models\RoleUser;
use Groups\Models\Groups;
use Groups\Models\GroupUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Config;
use Post\Models\Post;

class Users extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'email','username','password',
        'full_name','phone','address','token','remember_token','status','thumbnail','factory_id','bio','liked','code','level'];

    protected $hidden = ['password','token','remember_token'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function roles(){
        return $this->belongsToMany(Role::class,RoleUser::class,'user_id', 'role_id');
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
    }
    public function hasRole($role){
        $roles = $this->roles()->where('name',$role)->count();
        if($roles==1){
            return true;
        }else{
            return false;
        }
    }

    public function getRole()
    {
        $roles = $this->roles()->first();
        if (!empty($roles)) {
            return $roles->display_name;
        } else {
            return null;
        }
    }

    public function groups(){
        return $this->belongsToMany(Groups::class,GroupUser::class,'user_id', 'group_id')->withPivot(['permission']);
    }

    public function posts(){
        return $this->hasMany(Post::class,'user_post','id');
    }

}
