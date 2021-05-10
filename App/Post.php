<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='post';
    protected $fillable = ['title','description','status','created_user_id','updated_user_id','deleted_user_id','deleted_at'];

// public function book()
//     {
//         return $this->hasOne('App\Book', 'id','book_id');
//     }

public function user()
    {
        return $this->hasOne('App\Models\User', 'id','created_user_id');
    }
}