<div class="card mb-3">
    <div class="card-body">
        <a href="{{ route('post.show', $p->id) }}">
            <h3 class="card-title">{{ $p->title }}</h3>
        </a>
        <p class="card-text">{{ Str::limit($p->body, 180, '...') }}</p>
    </div>
    <div class="card-footer">
        {{ $p->created_at->diffForHumans() }}
    </div>
</div>
