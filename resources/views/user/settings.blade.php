@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="display-1 text-center">تعديل البيانات الشخصية </h2>
        <div class="my-5 text-center">
            <img src="{{ $user->profile->avatar ?? asset('imags/profile/avatar/avatar.png')}}" alt="" class="rounded-circle" width="255" height="255">
        </div>
        <form action="{{ route('settings') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group my-2">
                <label for="avatar">إختر صورتك الشخصية</label>
                <input id="avatar_file" class="form-control" type="file" name="avatar_file" accept="images/*">
            </div>
            <div class="form-group my-2">
                <label for="name">الإسم</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group my-2">
                <label for="email">البريد الإلكتروني </label>
                <input id="email" class="form-control" type="text" name="email" value="{{ $user->email }}" dir="ltr">
            </div>
            <div class="form-group my-2">
                <label for="email">الموقع الإلكتروني </label>
                <input id="website" class="form-control" type="text" name="website" value="{{ optional($user->profile)->website }}" dir="ltr">
            </div>
            <div class="form-group my-2">
                <label for="bio">النبذة الشخصية</label>
                <textarea id="bio" class="form-control" type="text" name="bio" cols="30" rows="10">{{ optional($user->profile)->bio}}</textarea>
            </div>
            <div class="form-group my-3 justify-content-reverse">
                <input class="btn btn-primary" type="submit" value="حفظ التعديلات">
                <input class="btn btn-light" type="reset" value="إلغاء">
            </div>
        </form>
    </div>
@endsection
