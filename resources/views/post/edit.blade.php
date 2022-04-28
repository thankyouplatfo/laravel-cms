@extends('layouts.app')
@section('content')
    <div class="col-md-8 bg-white" dir="rtl">
        <h2 class="display-2">أضف موضوعا جديدا</h2>
        @if (Session::has('msg'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
        @endif
        <form action="{{ route('post.update', $p->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <p class="form-group">
                <select class="categorie_id form-select" name="categorie_id" id="categorie_id" dir="rtl">
                    @include('lists.categories')
                </select>
            </p>
            <p class="form-group">
                <input class="title form-control" name="title" id="title" placeholder="أدخل عنوان المنشور"
                    value="{{ $p->title }}">
            </p>
            <p class="form-group">
                <textarea class="body form-control" name="body" id="body" cols="30" rows="10"
                    placeholder="أدخل محتوى المنشور">{{ $p->body }}</textarea>
            </p>
            <p class="form-group">
                <label for="image_path d-block my-3">اخنر صورة تتعلق بالموضوع</label>
                <img src="{{ Str::contains($p->image_path, ['http', 'https']) ? $p->image_path : asset('storage/' . $p->image_path) }}"
                    class="form-control d-block my-3 mx-auth w-25 h-25" style="height: 175px">
                <input class="image_path form-control" name="image_path" id="image_path" type="file">
            </p>
            <p class="form-group">
                <input class="btn btn-primary" type="submit" value="تحديث">
            </p>
        </form>
    </div>
@endsection
