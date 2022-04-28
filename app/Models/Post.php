<?php

namespace App\Models;

use App\Helpers\Slug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    //
    protected $fillable =
    [
        'title',
        'slug',
        'body',
        'image_path',
        'approved',
        'user_id',
        'categorie_id',
    ];
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
        //public function getImagepathAttribute($image)
        //{
        //    # code...
        //    //return asset('storage/images/posts/' . $image);
        //    return Str::contains($image, ['http', 'https']) ? $image : asset('storage/image/posts/' . $image);
        //}
    //
    //public function setImagepathAttribute($image_path)
    //{
    //    # code...
    //    
    //}
    //
    public function setTitleAttribute($val)
    {
        # code...
        $this->attributes['title'] = $val;
        //
        $this->attributes['slug'] = Slug::uniqueSlug($val, 'posts');
    }
}
