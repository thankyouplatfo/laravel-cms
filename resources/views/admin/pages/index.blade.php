@extends('admin.template')
@section('breadcrumb')
    الصفحات
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-row justify-content-between align-items-center ">
            <h2 class="display-2">الصفحات</h2>
            <a href="{{ route('page.create') }}" class=" btn w3-green display-2"><i class="fas fa-plus"></i></a>
        </div>
        @if (Session::has('msg'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
        @endif
        <table class="table text-center table-hover table-dark table-bordered">
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>الإسم</th>
                    <th>الإسم اللطيف</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td scope="row">{{ $page->id }} </td>
                        <td><a href="{{ route('page.show', $page->slug) }}" target="_blank">{{ $page->title }}</a></td>
                        <td>
                            <p>{{ $page->slug }}</p>
                        </td>
                        <td>
                            <a href="{{ route('page.edit', $page->id) }}" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-danger" style="text-align: right"
                                href="{{ route('page.destroy', $page->id) }}"
                                onclick="event.preventDefault(); document.getElementById('page_del').submit();alert('هل أنت متأكد ؟')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <form id="page_del" action="{{ route('page.destroy', $page->id) }}" method="POST"
                                class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
