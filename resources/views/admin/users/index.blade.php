@extends('admin.template')
@section('breadcrumb')
    المستخدمين
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-row justify-content-between align-items-center ">
            <h2 class="display-2">المستخدمين</h2>
            <a href="{{ route('users.create') }}" class=" btn w3-green display-2"><i class="fas fa-plus"></i></a>
        </div>
        @if (Session::has('msg'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
        @endif
        <table class="table text-center table-hover table-dark table-bordered">
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>الإسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الموقع الإلكتروني</th>
                    <th>النبذة الشخصية</th>
                    <th>عدد المقالات</th>
                    <th>حذف</th>
                    <th>تقرير مفصل</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td scope="row">{{ $user->id }} </td>
                        <td><a href="/{{ $user->id }}" target="_blank">{{ $user->name }}</a></td>
                        <td scope="row">{{ $user->email }} </td>
                        <td scope="row">{{ optional($user->profile)->website ?? 'ملف شخصي غير مكتمل' }} </td>
                        <td scope="row">
                            {{ Str::limit(optional($user->profile)->bio ?? 'ملف شخصي غير مكتمل', 25, '...') }}
                        </td>
                        <td>{{ count($user->posts) }}</td>
                        <td>
                            <a class="btn btn-danger" style="text-align: right"
                                href="{{ route('users.destroy', $user->id) }}"
                                onclick="event.preventDefault(); document.getElementById('user_del').submit();alert('هل أنت متأكد ؟')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <form id="user_del" action="{{ route('users.destroy', $user->id) }}" method="POST"
                                class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i
                                    class="fa-solid fa-note-sticky"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
