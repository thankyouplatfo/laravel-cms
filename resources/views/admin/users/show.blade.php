@extends('admin.template')
@section('breadcrumb')
    التقرير المفصل للمستخدم / {{ $user->name }}
@endsection
@section('content')
    <div class="card m-0">
        <div class="w3-section text-center">
            <img src="{{ optional($user->profile)->avatar }}" class="rounded-top w3-image" alt="">
        </div>
        <div class="card-body">
            <h4 class="card-title">المعلومات الشخصية</h4>
            <div class="w3-responsive">
                <table class="table text-center table-hover table-dark table-bordered">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>الإسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>الموقع الإلكتروني</th>
                            <th>النبذة الشخصية</th>
                            <th>عدد المقالات</th>
                            <th>عدد التعليقات</th>
                            <th>تاريخ الإنضمام</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">{{ $user->id }} </td>
                            <td><a href="/{{ $user->id }}" target="_blank">{{ $user->name }}</a></td>
                            <td scope="row">{{ $user->email }} </td>
                            <td scope="row">{{ optional($user->profile)->website ?? 'ملف شخصي غير مكتمل' }} </td>
                            <td scope="row">
                                <p>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#contentId" aria-expanded="false" aria-controls="contentId">
                                        إضهار
                                    </button>
                                </p>
                                <div class="collapse" id="contentId">
                                    {{ optional($user->profile)->bio }}
                                </div>
                            </td>
                            <td>{{ count($user->posts) }}</td>
                            <td>{{ count($user->comments) }}</td>
                            <td>{{ $user->created_at .' - '. $user->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <img src="holder.js/100x180/" alt="">
        <div class="card-body">
            {{-- <p class="card-text">Text</p>
            <a href="#" class="card-link">Link 1</a>
            <a href="#" class="card-link">Link 2</a> --}}
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
                    @forelse ($user->posts as $p)
                        @include('user.posts')
                    @empty
                        @include('alerts.empty')
                    @endforelse
                </div>
                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h2 class="display-2 my-2">التعليقات</h2>
                    @forelse ($user->comments as $c)
                        @include('user.comments')
                    @empty
                        @include('alerts.emptyComments')
                    @endforelse
                </div>
            </div>
        </div>

    </div>
@endsection
