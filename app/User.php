<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role ()
    {
        return $this->belongsTo(Role::class);
    }

    public function borrow()
    {
        return $this->belongsToMany(Borrow::class, 'book_borrow')->withPivot('book_id');
    }

    public function book()
    {
        return $this->belongsToMany(Book::class, 'book_borrow')->withPivot('book_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
