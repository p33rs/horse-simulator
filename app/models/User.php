<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;
    protected $guarded = ['password', 'remember_token'];
	protected $hidden = ['password', 'remember_token'];
    public function horses()
    {
        return $this->hasMany('Horse');
    }
}
