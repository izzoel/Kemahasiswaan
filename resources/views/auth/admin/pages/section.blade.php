@extends('layout.template')

@php
    $segment1 = request()->segment(1);
    $segment2 = request()->segment(2);
    $segment3 = request()->segment(3);

    // Cek jumlah segmen dalam URL
    if ($segment3) {
        $sectionName = "{$segment1}.{$segment3}";
        $viewName = "auth.{$segment1}.pages.{$segment2}.{$segment3}";
    } else {
        $sectionName = "{$segment1}.{$segment2}";
        $viewName = "auth.{$segment1}.pages.{$segment2}";
    }
@endphp
@section($sectionName)
    @includeIf($viewName)
@endsection
