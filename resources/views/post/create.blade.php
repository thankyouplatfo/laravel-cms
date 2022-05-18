@extends('layouts.app')
@section('content')
    <div class="col-md-8 bg-white" dir="rtl">
        <h2 class="display-2">أضف موضوعا جديدا</h2>
        @if (Session::has('msg'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
        @endif
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p class="form-group">
                <select class="category_id form-select" name="category_id" id="category_id" dir="rtl">
                    @include('lists.categories')
                </select>
            </p>
            <p class="form-group">
                <input class="title form-control" name="title" id="title" placeholder="أدخل عنوان المنشور">
            </p>
            <p class="form-group">
                <textarea class="body form-control" name="body" id="body" cols="30" rows="10"
                    placeholder="أدخل محتوى المنشور"></textarea>
            </p>
            <p class="form-group">
                <label for="image_path">اخنر صورة تتعلق بالموضوع</label>
                <input class="image_path form-control" name="image_path" id="image_path" type="file">
            </p>
            <p class="form-group">
                <input class="btn btn-primary" type="submit" value="حفظ">
            </p>
        </form>
    </div>
@endsection
