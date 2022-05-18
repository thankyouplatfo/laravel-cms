@extends('admin.template')
@section('breadcrumb')
    الإحصائيات
@endsection
@section('content')
    <h2 class="display-2">الإحصائيات</h2>

    <div class="container-fluid">
        <div class="w3-row-padding">
            <div class="w3-col l4 mb-3 w3-right">
                <div class="card">
                    <div class="card-header">
                        <h3>المنشورات {{ $posts_count }}</h3>
                    </div>
                    <div class="card-body w3-hide">
                        <h4 class="card-title">blablabla</h4>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('posts.index') }}"><i
                                class="fa-solid fa-arrow-left-long m-0 p-0 w3-left"></i></a> المزيد
                    </div>
                </div>
            </div>
            <div class="w3-col l4 mb-3 w3-right">
                <div class="card">
                    <div class="card-header">
                        <h3>التصنيفات {{ $categories_count }}</h3>
                    </div>
                    <div class="card-body w3-hide">
                        <h4 class="card-title">blablabla</h4>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('categories.index') }}"><i
                                class="fa-solid fa-arrow-left-long m-0 p-0 w3-left"></i></a> المزيد
                    </div>
                </div>
            </div>
            <div class="w3-col l4 mb-3 w3-right">
                <div class="card">
                    <div class="card-header">
                        <h3>المستخدمين {{ $users_count }}</h3>
                    </div>
                    <div class="card-body w3-hide">
                        <h4 class="card-title">blablabla</h4>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('users.index') }}"><i class="fa-solid fa-arrow-left-long m-0 p-0 w3-left"></i></a> المزيد
                    </div>
                </div>
            </div>
            <div class="w3-col l4 mb-3 w3-right">
                <div class="card">
                    <div class="card-header">
                        <h3>التعليقات {{ $comments_count }}</h3>
                    </div>
                    <div class="card-body w3-hide">
                        <h4 class="card-title">blablabla</h4>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <a href="/"><i class="fa-solid fa-arrow-left-long m-0 p-0 w3-left"></i></a> المزيد
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
