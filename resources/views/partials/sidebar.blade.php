<div class="col-lg-4 p-1">
    <div class="card mb-3">
        <div class="card-header">
            <h2>{{ __('site.Categories') }}</h2>
        </div>
        <div class="card-body">
            <ul class="nav flex-column"> 
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a href="#" class="nav-link">{{ $category->title }}</a>
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

        </div>
    </div>
</div>
