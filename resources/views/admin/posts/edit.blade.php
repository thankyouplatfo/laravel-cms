@extends('admin.template')
@section('breadcrumb')
    تحرير المنشورات
@endsection
@section('content')
    <h2 class="display-2">تحرير المنشور</h2>
    @if (Session::has('msg'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
    @endif
    <div class="text-center">
        <img src="{{ Str::contains($p->image_path, ['https']) ? $p->image_path : asset('storage/' . $p->image_path) }}" width="333" height="333"
            class="d-block my-3 mx-auto">
    </div>
    <form action="{{ route('posts.update', $p->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <p class="form-group">
            <select class="category_id form-select" name="category_id" id="category_id" dir="rtl">
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
            <label for="approved" class="form-label w3-large">
                <input type="checkbox" name="approved" id="approved" value="$p->approved" class="w3-check w3-large"
                    {{ $p->approved == 1 ? 'checked' : '' }} onclick="this.form.submit()">
                نشر الموضوع
            </label>
        <div class="alert w3-red alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>الضغط على الخيار أعلاه سيقوم مباشرة بإرسال النموذج وبث المنشور للعامة</strong>
        </div>

        <script>
            var alertList = document.querySelectorAll('.alert');
            alertList.forEach(function(alert) {
                new bootstrap.Alert(alert)
            })
        </script>

        </p>
        <p class="form-group">
            <label for="image_path">اخنر صورة تتعلق بالموضوع</label>
            <input class="image_path form-control" name="image_path" id="image_path" type="file">
        </p>
        <p class="form-group">
            <input class="btn btn-primary" type="submit" value="تحديث">
        </p>
    </form>
@endsection
