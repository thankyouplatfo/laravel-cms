@extends('admin.template')
@section('breadcrumb')
    إنشاء مستخدم
@endsection
@section('content')
    <div class="container-fluid">
        <h2 class="display-2">إنشاء مستخدم</h2>
        @if (Session::has('msg'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
        @endif
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <p>
                <label class="form-label w3-large" for="name">الإسم</label>
                <input type="text" class="w3-input w3-border w3-round name" name="name" id="name"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="w3-tag w3-red w3-round">
                        {{ $message }}
                    </p>
                @enderror
            </p>
            <p>
                <label class="form-label w3-large" for="email">البريد الإلكتروني</label>
                <input type="email" class="w3-input w3-border w3-round email" name="email" id="email"
                    value="{{ old('email') }}" dir="ltr">
                @error('email')
                    <p class="w3-tag w3-red w3-round">
                        {{ $message }}
                    </p>
                @enderror
            </p>

            <p>
                <label class="form-label w3-large" for="password">كلمة المرور</label>
                <input type="password" class="w3-input w3-border w3-round password" name="password" id="password"
                    value="{{ old('password') }}" dir="ltr">
                @error('password')
                    <p class="w3-tag w3-red w3-round">
                        {{ $message }}
                    </p>
                @enderror
            </p>
            {{-- <p class="d-none">
                <label class="form-label w3-large" for="avatar">الصورة الشخصية</label>
                <input type="file" class="w3-input w3-border w3-round avatar" name="avatar" id="avatar"
                    value="{{ old('avatar') }}">
                @error('avatar')
                    <p class="w3-tag w3-red w3-round">
                        {{ $message }}
                    </p>
                @enderror
            </p>
            <p class="d-none">
                <label class="form-label w3-large" for="website">الموقع الإلكتروني</label>
                <input type="url" class="w3-input w3-border w3-round website" name="website" id="website"
                    value="{{ old('website') }}" dir="ltr">
                @error('website')
                    <p class="w3-tag w3-red w3-round">
                        {{ $message }}
                    </p>
                @enderror
            </p>
            <p class="d-none">
                <label class="form-label w3-large" for="bio">السيرة الشخصية</label>
                <textarea class="w3-input w3-border w3-round bio" name="bio" id="bio" cols="30"
                    rows="10">{{ old('bio') }}</textarea>
                @error('bio')
                    <p class="w3-tag w3-red w3-round">
                        {{ $message }}
                    </p>
                @enderror
            </p> --}}
            <p>
                <input type="submit" class="btn btn-primary">
            </p>
        </form>
    </div>
@endsection
