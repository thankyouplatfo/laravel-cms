@extends('layouts.app')
@section('content')
    @forelse ($posts as $p)
        <div class="card mb-4">
            <img src="{{ Str::contains($p->image_path, ['https']) ? $p->image_path : asset('storage/' . $p->image_path) }}"
                class="card-img-top">
        </div>
        {{--
        أنا هنا بقله الرابط على العبارة أو جزء منه يحتوي على عبارة 
        https
        معناته هذا رابط مو محلي من داخل الملفات قوم بجلبه 
        وإلا أي (عكس الشرط) قم بجلب الرابط المحلي 
        طبعا إذا مشروعك على الإنترنت راح تكون جميع روابطك تبدأ بــ 
        https
        وبكذا يكون عليك تغير الشرط إلى كتابة إسم الموقع كاملا أو جزء منه بالشكل التالي
        Str::contains($p->image_path, ['https://via.placeholder.com']) ? $p->image_path : asset('storage/' . $p->image_path)
        أو
        Str::contains($p->image_path, ['placeholder.com']) ? $p->image_path : asset('storage/' . $p->image_path) --}}
    @empty
        @include('alerts.empty')
    @endforelse
@endsection
