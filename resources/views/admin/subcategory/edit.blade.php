@extends('layouts.admin')

@section('content')
    <livewire:admin.sub-category.edit :subcategory="$subcategory" :categories="$categories" />
@endsection