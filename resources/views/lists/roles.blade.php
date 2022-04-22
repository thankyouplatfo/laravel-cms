<option selected>اختر الدور المناسب</option>
@foreach ($roles as $r)
    <option value="{{ $r->id }}">{{ $r->title }}</option>
@endforeach
