<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    protected $post;
    //
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    //
    public function index()
    {
        # code...
        $AllPosts = $this->post::with('user', 'category.posts')->paginate(15);
        //
        return view('admin.posts.all', compact('AllPosts'));
    }
    //
    public function edit($id)
    {
        # code...
        $p = $this->post::find($id);
        //
        return view('admin.posts.edit', compact('p'));
    }
    //
    public function update($id, Request $request)
    {
        $data = $request->all();
        //
        $data['approved'] = $request->has('approved');
        //
        if ($request->hasFile('image_path')) {
            # code...
            $image_path = request('image_path')->store('images/post');
            //
            $data['image_path'] = $image_path;
            //
            $this->post::find($id)->update($data);
        }
        //
        $this->post::find($id)->update($data);
        //
        return back()->with('msg', trans('alerts.okUpdateByAdmin'));
    }
}
