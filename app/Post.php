<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //if you want to change table name
    protected $table = 'posts';
    //primary key
    public $primarykey = 'id';
    //time stamp
    public $timestamps = 'true';

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function category(){
		return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
