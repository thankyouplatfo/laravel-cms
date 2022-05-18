@extends('layouts.app')
@section('content')
    <div class="container text-muted">
        @if (Session::has('msg'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
        @endif
        <div class="row bg-white p-3 mb-4">
            <div class="col-md-3 text-center">
                <img class="img-fluid rounded" src="{{ $contents->profile->avatar ?? asset('imags/profile/avatar/avatar.png')}}" alt="">
            </div>
            <div class="col-md-9 p-3">
                <h2>{{ $contents->name }}</h2>
                <p class="word-break">{{ optional($contents->profile)->bio }}</p>
                <a href="">{{ optional($contents->profile)->website }}</a>
            </div>
        </div>
        <div class="row p-3">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">المنشورات</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">التعليقات</button>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h2 class="display-2 my-2">المنشورات</h2>
                    @forelse ($contents->posts as $p)
                        @include('user.posts')
                    @empty
                        @include('alerts.empty')
                    @endforelse
                </div>
                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h2 class="display-2 my-2">التعليقات</h2>
                    @forelse ($contents->comments as $c)
                        @include('user.comments')
                    @empty
                        @include('alerts.emptyComments')
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
