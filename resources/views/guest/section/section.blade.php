@extends('guest.template')

@php
    $sectionName = is_null(request()->segment(1)) ? 'landing' : request()->segment(1);
    $viewName = is_null(request()->segment(1)) ? 'guest.home.home' : 'guest.' . request()->segment(1) . '.' . request()->segment(1);
@endphp

@section($sectionName)
    @include($viewName)
@endsection
