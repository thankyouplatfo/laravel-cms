@extends('admin.template')
@section('breadcrumb')
    إنشاء تصنيف
@endsection
@section('content')
    <div class="container-fluid">
        <h2 class="display-2">إنشاء تصنيف</h2>
        @if (Session::has('msg'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
        @endif
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <p class="form-group">
                <label for="title" class="form-label">ادخل اسما مناسبا للقسم المنشأ</label>
                <input class="title form-control" name="title" id="title" placeholder="ادخل اسما مناسبا للقسم المنشأ">
            </p>
            <p>
                <button type="submit" class="btn btn-primary">إنشاء</button>
            </p>
        </form>
        <!-- TODO: This is for server side, there is another version for browser defaults -->
    </div>
@endsection
