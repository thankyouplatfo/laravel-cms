<option selected value="0">اختر الدور المناسب</option>
@foreach ($roles as $r)
    <option value="{{ $r->id }}" class="w3-text-black">{{ $r->role }}</option>
@endforeach
