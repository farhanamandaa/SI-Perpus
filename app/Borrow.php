<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $guarded = [];

    public function book()
    {
    	return $this->belongsToMany(Book::class)->withPivot('user_id');
    }

    public function user()
    {
    	return $this->belongsToMany(User::class, 'book_borrow');
    }
}
