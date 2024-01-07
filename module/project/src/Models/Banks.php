<?php

namespace Project\Models;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    protected $table='banks';
    protected $fillable = ['name','account_name','bank_id','account_no','template','sort_order'];
}
