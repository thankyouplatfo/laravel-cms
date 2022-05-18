@extends('admin.template')
@section('breadcrumb')
    إنشاء صفحة جديدة
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fas fa-file w3-xlarge"></i>
        </div>
        <div class="card-body">
            @if (Session::has('msg'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
            @endif
            <form action="{{ route('page.store') }}" method="post" style="display: block!important" id="create-page">
                @csrf
                <p>
                    <label for="title">عنوان الصفحة</label>
                    <input class="title w3-input" name="title" id="title" oninput="$('#slug').val($(this).val())">
                </p>
                <p>
                    <label for="content">المحتوى</label>
                    <textarea class="content w3-input summernote" name="content" id="content" cols="30" rows="10"></textarea>
                </p>

            </form>
        </div>
        <div class="card-footer">
            <input class="w3-button w3-bar-item w3-light-blue w3-left" value="أنشر" form="create-page" type="submit">
        </div>
    </div>
@endsection
@section('script')
    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
@endsection
