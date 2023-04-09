@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{url('')}}/style/detail.css">
@endsection
@section('main')
    <x-detail :film="$film" :releaseDates="$release_dates"  :timelines="$timelines" :idDate="$idDate" />
    <!-- Modal -->
   
    
@endsection
