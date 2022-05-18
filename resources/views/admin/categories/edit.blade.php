@extends('admin.template')
@section('breadcrumb')
    تعديل تصنيف
@endsection
@section('content')
    <div class="container-fluid">
        <h2 class="display-2">إنشاء تصنيف</h2>
        @if (Session::has('msg'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
        @endif
        <form action="{{ route('categories.update', $cat->id) }}" method="post">
            @csrf
            @method('put')
            <p class="form-group">
                <label for="title" class="form-label">عدل على اسم القسم</label>
                <input class="title form-control" name="title" id="title" placeholder="عدل على اسم القسم"
                    value="{{ $cat->title }}">
            </p>
            <p>
                <button type="submit" class="btn btn-primary">إنشاء</button>
            </p>
        </form>
        <!-- TODO: This is for server side, there is another version for browser defaults -->
    </div>
@endsection
