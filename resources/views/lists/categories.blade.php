<option selected>اختر التصنيف المناسب</option>
@if (!isset($p))
    @foreach ($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
    @endforeach
@else
    @foreach ($categories as $cat)
        <option value="{{ $cat->id }}" {{ $p->categorie_id == $cat->id ? 'selected' : '' }}>{{ $cat->title }}</option>
    @endforeach
@endif
