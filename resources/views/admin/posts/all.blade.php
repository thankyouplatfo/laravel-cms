@extends('admin.template')
@section('breadcrumb')
    المنشورات
@endsection
@section('content')
    <h2 class="display-2">المنشورات</h2>
    <div class="container-fluid">
        <table class="table text-center table-hover table-dark table-bordered">
            <thead>
                <tr>
                    <th>الرقم </th>
                    <th>العنوان </th>
                    <th>الإسم اللطيف </th>
                    <th>المحتوى</th>
                    <th>الكاتب</th>
                    <th>نشر</th>
                    <th>التصنيف</th>
                    <th>تحرير</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($AllPosts as $p)
                    <tr>
                        <td scope="row">{{ $p->id }}</td>
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->slug }}</td>
                        <td><a class="w3-hover-text-white"
                                href="/post/{{ $p->id }}">{{ Str::limit($p->body, 50, '...') }}</a></td>
                        <td>{{ $p->user->name }}</td>
                        <td>
                            <form action="{{ route('posts.update', $p->id) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="checkbox" class="w3-check w3-xlarge" name="approved"
                                    value="{{ $p->approved }}" onclick="this.form.submit()"
                                    {{ $p->approved == 1 ? 'checked' : '' }}>
                            </form>
                        </td>
                        <td>{{ $p->category ? $p->category->title : '' }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $p->id) }}" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
