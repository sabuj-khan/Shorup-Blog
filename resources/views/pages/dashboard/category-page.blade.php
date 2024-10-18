@extends('layouts.app-dashboard')
@section('content')
    @include('components.dashboard.category.category-list')
    @include('components.dashboard.category.category-create')
    @include('components.dashboard.category.category-update')
    @include('components.dashboard.category.category-delete')
@endsection