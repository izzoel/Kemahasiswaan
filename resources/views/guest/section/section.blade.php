@extends('guest.template')

{{-- @php
    $sectionName = is_null(request()->segment(1)) ? request()->segment(1) : request()->segment(1) . '_' . request()->segment(2);
    $viewName = is_null(request()->segment(1)) ? 'guest.' . request()->segment(1) : request()->segment(1) . request()->segment(2);
@endphp --}}

@section('landing')
    @include('guest.home.home')
@endsection
