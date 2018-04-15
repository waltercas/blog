<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
        protected $fillable = ['user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file',];

        public function user()
        {
        	       return $this->belongsTo('App\User');
        }
        
        public function category()
        {
        	       return $this->belongsTo('App\Category');
        }

        public function tags()
        {
                         return $this->belongsToMany('App\Tag');
        }
}
