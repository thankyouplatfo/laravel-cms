<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public $user;
    //
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    //
    public function getByUser($id)
    {
        # code...
        $contents = $this->user->with('profile', 'posts', 'comments.post')->find($id);
        //
        return view('user.profile', compact('contents'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = $this->user->with('profile')->find(Auth()->id());
        //
        return view('user.settings', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = ['user_id' => Auth::id()];
        //
        if ($request->hasFile('avatar_file')) {
            # code...
            $avatar = request('avatar_file')->store('images/profile/avatar');
            $request->merge(['avatar' => $avatar]);
        }
        //
        auth()->user()->update($request->only('name', 'email'));

        auth()->user()->profile()->updateOrCreate($id, $request->only('website', 'bio','avatar'));

        //
        return back()->with('msg', trans('alert.profileUpdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
