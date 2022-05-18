<div class="card mb-3">
    <li class="list-group-item">عنوان المقالة: <a
            href="{{ route('post.show', $c->post->id.'#commentsContainer') }}">{{ $c->post->title }}</a></li>
    <div class="card-body">
        <p class="card-text">{{ $p->body }}</p>
    </div>
    <div class="card-footer">
        {{ $p->created_at->diffForHumans() }}
    </div>
</div>
