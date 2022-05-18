<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    use HasFactory;
    //
    protected $fillable = ['user_id', 'avatar', 'website', 'bio'];
    //
    public function getAvatarAttribute($avatar)
    {
        # code...
        return Str::contains($avatar, ['https'])? $avatar: asset('storage/' . $avatar);
    }
}
