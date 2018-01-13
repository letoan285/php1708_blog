<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts(){
    	return $this->hasMany('App\Models\Post');
    }

    public function getParentName(){
    	$parent = self::find($this->parent_id);
    	if (!$parent) {
    		return null;
    	}
    	return $parent->name;

    }
}
