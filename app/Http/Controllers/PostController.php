<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostController extends Controller
{
    protected $post;
    protected $faker;
    //        
    public function __construct(Post $post, Faker $faker)
    {
        $this->post = $post;
        $this->faker = $faker;
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
        $data = $request->all();
        //
        if ($request->hasFile('image_path')) {
            # code...
            $image_path = request('image_path')->store('images/post');
            $data['image_path'] = $image_path;
        } else {
            $data['image_path'] = $this->faker->imageUrl;
        }
        //
        $request->user()->posts()->create($data);
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
    public function edit($id)
    {
        //
        $p = $this->post->find($id);
        //
        return view('post.edit', compact('p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {   $data = $request->all();
        //
        if ($request->hasFile('image_path')) {
            # code...
            $image_path = request('image_path')->store('images/post');
            $data['image_path'] = $image_path;
            $request->user()->posts()->find($id)->update($data);

        }else {
            # code...
            $request->user()->posts()->find($id)->update($data);
        }
        //
        return back()->with('msg', trans('alerts.updateSuccess') . $request->id);
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
