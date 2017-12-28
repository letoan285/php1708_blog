<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Profile;

class Profile extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
