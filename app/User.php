<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Profile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRoleName(){
        if ($this->role == 50) {
            return "Super Amin";
        } elseif($this->role == 20) {
            return "Admin";
        } else {
            return "Author";
        }
    }
    public function profile(){
        return $this->hasOne(Profile::class);
    }
}
