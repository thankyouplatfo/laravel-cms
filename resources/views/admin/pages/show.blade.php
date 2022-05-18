@extends('layouts.app')
@section('content')
<h2>{{ $page->title }}</h2>
{!! $page->content !!}
@endsection
