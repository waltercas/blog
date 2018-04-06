<?php

namespace App;

use App\Category;
use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
        protected $fillable = ['name', 'slug', 'excerpt', 'body', 'status', 'file',];

        public function user()
        {
        		return $this->belongTo('User');
        }
        
        public function category()
        {
        		return $this->belongTo('Category');
        }

        public function tags()
        {
        	return $this->belongsToMany('Tag');
		}

}
