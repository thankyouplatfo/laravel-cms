<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category,Comment,Post,User};

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('admin.index')
        ->with('posts_count',Post::count())
        ->with('users_count',User::count())
        ->with('comments_count',Comment::count())
        ->with('categories_count',Category::count())
        ;
    }
}
