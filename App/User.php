<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    
    protected $table='users';
    protected $fillable = ['title','description','status','created_user_id','updated_user_id','deleted_user_id','deleted_at'];
}