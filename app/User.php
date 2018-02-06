<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function quizzes () {
        return $this->belongsToMany(\App\Quiz::class);
    }

    public function roles () {
        return $this->belongsToMany(Role::class);
    }

    public function assignTo(Role $role) {
        return $this->roles()->save($role);
    }

    public function hasRole ($role) {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();

        // foreach ($role as $r) {
        //     if ($this->hasRole($role->name)) {
        //         return TRUE;
        //     }
        // }

        // return false;
    }
}
