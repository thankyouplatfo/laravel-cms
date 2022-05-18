@extends('admin.template')
@section('breadcrumb')
    تعديل صفحة
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
            <form action="{{ route('page.update',$page->id) }}" method="post" style="display: block!important" id="update-page">
                @csrf
                @method('put')
                <p>
                    <label for="title">عنوان الصفحة</label>
                    <input class="title w3-input" name="title" id="title" oninput="$('#slug').val($(this).val())" value="{{ $page->title }}">
                </p>
                <p>
                    <label for="content">المحتوى</label>
                    <textarea class="content w3-input summernote" name="content" id="content" cols="30" rows="10">
                        {!! $page->content !!}
                    </textarea>
                </p>

            </form>
        </div>
        <div class="card-footer">
            <input class="w3-button w3-bar-item w3-light-blue w3-left" value="أنشر" form="update-page" type="submit">
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
