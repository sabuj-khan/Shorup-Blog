@extends('layouts.app-dashboard')
@section('content')
    @include('components.dashboard.tag.tag-list')
    @include('components.dashboard.tag.tag-create')
    @include('components.dashboard.tag.tag-update')
    @include('components.dashboard.tag.tag-delete')
@endsection