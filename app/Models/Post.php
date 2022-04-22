<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
    //
    public function category()
    {
        # code...
        return $this->belongsTo(Category::class);
    }
    //
    public function comments()
    {
        # code...
        return $this->hasMany(Comment::class);
    }
    //
    public function scopeApproved($q)
    {
        # code...
        return $q->whereApproved(true);
    }
    //
    public function getImagePathAtteribute($image)
    {
        # code...
        //return asset('path'.$image)
    }
}
