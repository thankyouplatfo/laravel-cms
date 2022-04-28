<div class="col-lg-4 p-1">
    <div class="card mb-3">
        <div class="card-header">
            <h2>{{ __('site.Categories') }}</h2>
        </div>
        <div class="card-body">
            <ul class="nav flex-column">
                @foreach ($categories as $cat)
                    <li class="nav-item">
                        <a href="/{{ $cat->id }}/{{ $cat->slug }}" class="nav-link">{{ $cat->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <h2>{{ __('site.Latest_comments') }}</h2>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($return_latest_comments as $r_comment)
                    <li class="list-group-item">
                        <img src="imags/profile/avatar/avatar.png" alt="" width="120" height="120" class="circle">
                        <a href="{{ route('post.show',$r_comment->post->id) }} #commentsContainer">{{ Str::limit($r_comment->body,25,'...') }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
