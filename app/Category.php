<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //if you want to change table name **optional
    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    public function posts(){
    	return $this->hasMany('App\Post');
    }
}
