<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('title','body','user_id'); 
	protected $hidden = array('user_id');
	public $timestamps = true;
}