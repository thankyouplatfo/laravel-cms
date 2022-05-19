<div class="card mb-3">
    <div class="card-body">
        <a href="{{ route('post.show', $p->id) }}">
            <h3 class="card-title">{{ $p->title }}</h3>
        </a>
        <p class="card-text">{{ Str::limit($p->body, 180, '...') }}</p>
        @can('edit-post')
            <a href="{{ route('post.edit', $p->id) }}" class="w3-bar-item card-subtitle text-success">تعديل</a>
        @endcan
        @can('edit-post')
            <a href="{{ route('post.edit', $p->id) }}" class="w3-bar-item card-subtitle text-danger"
                onclick="event.preventDefault(); document.getElementById('del-post').submit();">حذف</a>
        @endcan
        <form id="del-post" action="{{ route('post.destroy', $p->id) }}" method="POST" class="d-none">
            @csrf
            @method('DELETE')
        </form>

    </div>
    <div class="card-footer">
        {{ $p->created_at->diffForHumans() }}
    </div>
</div>
