@extends('admin.template')
@section('breadcrumb')
    التصنيفات
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-row justify-content-between align-items-center ">
            <h2 class="display-2">التصنيفات</h2>
            <a href="{{ route('categories.create') }}" class=" btn w3-green display-2"><i class="fas fa-plus"></i></a>
        </div>
        @if (Session::has('msg'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
        @endif
        <table class="table text-center table-hover table-dark table-bordered">
            <thead>
                <tr>
                    <th>الرقم </th>
                    <th>العنوان</th>
                    <th>الإسم اللطيف</th>
                    <th>عدد المقالات</th>
                    <th class="d-none">عناوين المقالات</th>
                    <th>تحرير</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                    <tr>
                        <td scope="row">{{ $cat->id }} </td>
                        <td><a href="/{{ $cat->id }}/{{ $cat->slug }}" target="_blank">{{ $cat->title }}</a></td>
                        <td>{{ $cat->slug }} </td>
                        <td>{{ count($cat->posts) }}</td>
                        <td class="d-none">
                            <ul class="w3-ul">
                                @foreach ($cat->posts as $item)
                                    <li>{{ $item->title }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-danger" style="text-align: right"
                                href="{{ route('categories.destroy', $cat->id) }}"
                                onclick="event.preventDefault(); document.getElementById('cat_del').submit();alert('هل أنت متأكد ؟')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <form id="cat_del" action="{{ route('categories.destroy', $cat->id) }}" method="POST"
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
