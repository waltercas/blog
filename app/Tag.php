<?php

namespace App;

use App\Category;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
        protected $fillable = ['name', 'slug',];

        public function Post()
        {
        	return $this->belongsToMany('Post');
		}


}


        
