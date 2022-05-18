@extends('layouts.app')
@section('content')
    <div class="col-md-8 p-1">
        <div class="container-fluid bg-white pr-2">
            <h2 class="display-2">المنشورات</h2>
            @forelse ($posts as $p)
                <div class="card mb-4">
                    <img src="{{ Str::contains($p->image_path, ['https']) ? $p->image_path : asset('storage/' . $p->image_path) }}"
                        class="card-img-top" height="225">
                    <div class="card-body">
                        <h3 class="card-title">{{ $p->title }}</h3>
                        <p class="card-text">{{ Str::limit($p->body, 100, '...') }}</p>
                        <a href="{{ route('post.show', $p->id) }}" id="" class="btn btn-primary" href="{{ $p->id }}"
                            role="button">المزيد</a>
                    </div>
                    <div class="card-footer text-muted">
                        {{ $p->created_at->difFforHumans() }} - بواسطة
                        <a href="/{{ $p->user->id }}">{{ $p->user->name }}</a>
                    </div>
                </div>
            @empty
                @include('alerts.empty')
            @endforelse
            <div class="py-3">
                <ul class="pagination justify-content-center">
                    {{ $posts->links() }}
                </ul>
            </div>
        </div>
    </div>
    @include('partials.sidebar')
@endsection
