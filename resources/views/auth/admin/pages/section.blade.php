@extends('layout.template')

{{-- @php
    $sectionName = is_null(Auth::user()) ? request()->segment(1) . '_submit' : request()->segment(1) . '_' . request()->segment(2);
    $viewName = is_null(Auth::user()) ? 'auth.' . request()->segment(1) . '.pages.submit' : 'auth.' . request()->segment(1) . '.pages.' . request()->segment(2);
@endphp --}}

@section(request()->segment(1) . '_' . request()->segment(2))
    @include('auth.' . request()->segment(1) . '.pages.' . request()->segment(2))
@endsection
