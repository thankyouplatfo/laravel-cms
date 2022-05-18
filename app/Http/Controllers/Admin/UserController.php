<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserController extends Controller
{
    protected $user;
    protected $faker;
    //
    public function __construct(User $user, Faker $faker)
    {
        $this->user = $user;
        $this->middleware('auth');
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
        $users = $this->user->with('profile')->latest()->paginate(10);
        //
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        //
        $request['password'] = Hash::make('password');
        //
        auth()->user()->create($request->only('name', 'email', 'password'));
        //
        return back()->with('msg', trans('alerts.msg_c'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = $this->user::find($id);
        //dd($user);
        //
        return view('admin.users.show', compact('user'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->user::find($id)->delete();
        //
        return back()->with('msg', trans('alerts.msg_d'));
    }
}
