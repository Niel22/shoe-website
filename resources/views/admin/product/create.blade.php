@extends('layouts.admin')

@section('content')
    <livewire:admin.product.create :colors="$colors"/>
@endsection
