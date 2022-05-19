@foreach ($roles as $r)
    <option value="{{ $r->id }}" class="w3-text-black" {{ $r->id == 1 ? 'checked' : '' }}>{{ $r->role }}
    </option>
@endforeach
