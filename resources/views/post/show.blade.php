@extends('layouts.app')
@section('content')
    <div class="col-md-8">
        <div class="content bg-white p-5">
            <div class="card border-0">
                <h2 class="display-2 pb-5">{{ $p->title }}</h2>
                <img class="card-img-top" src="{{ $p->image_path }}" alt="">
                <div class="blockquote card-body">

                    <p class="blockquote-text">{{ $p->body }}</p>
                </div>
                <div class="card-footer">
                    {{ $p->created_at }} - {{ $p->user->name }}
                </div>
            </div>
        </div>
    </div>
      
    @include('partials.sidebar')
@endsection
