<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    protected $post;
    //        
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$data = $this->post::latest()->get();
        //$data = $this->post::with('user:id,name')->latest()->paginate(15);
        $data = $this->post::with('user:id,name')->latest()->approved()->paginate(15);

        //
        return view('index', [
            'posts' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->user()->posts()->create($request->all() + [
            //'slug' => Str::slug($request->title),
            //'image_path' => $request->store('images/post/caption'),
        ]);
        //
        return back()->with('msg', trans('alerts.success') . $request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $p = $this->post::findOrFail($id);
        //
        return view('post.show', compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    //
    public function getByCat($id)
    {
        //
        $posts = $this->post::with('user:id,name')->whereCategorieId($id)->approved()->paginate(15);
        //
        return view('index', compact('posts'));
    }
    //
    public function search(Request $r)
    {
        # code...
        $posts = $this->post->where('body', 'LIKE', '%' . $r->keyword . '%')->with('user:id,name')->approved()->paginate(15);
        //
        return view('index', compact('posts'));
    }
}
