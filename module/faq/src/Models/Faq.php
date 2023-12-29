<?php


namespace Faq\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $fillable = ['name','description','sort_order','status'];

}
