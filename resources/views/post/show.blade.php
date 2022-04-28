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
            <div class="container my-5" id="commentsContainer">
                @foreach ($p->comments as $c)
                    <div>
                        <div class="card my-1">
                            <div class="card-body">
                                <blockquote class="blockquote">
                                    <p>{{ $c->body }}</p>
                                    <footer class="blockquote-footer"><cite class="mx-2"
                                            title="{{ $c->user->name }}">{{ $c->user->name }}</cite>{{ $c->created_at->diffForHumans() }}
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row form-group ">
                <h3 class="display-3">التعليقات</h3>
                @if (Session::has('msg'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
                @endif
                <form action="{{ route('comment.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea class="body form-control" name="body" id="body" cols="30" rows="10"></textarea>
                        @error('body')
                            {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 float-start">إرسال</button>
                    <input type="hidden" name="post_id" value="{{ $p->id }}">
                </form>
            </div>
        </div>
    </div>
    @include('partials.sidebar')
@endsection
