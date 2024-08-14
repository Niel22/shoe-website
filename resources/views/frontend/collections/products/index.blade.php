@extends('layouts.app')
@section('pageTitle')
    {{ $category->meta_title }}
@endsection
@section('meta_keyword')
    {{ $category->meta_keyword }}
@endsection
@section('meta_description')
    {{ $category->meta_description }}
@endsection

@section('content')

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-100 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">{{ $category->name }}</h3>
                        <div class="breadcrumb__list">
                            <span><a href="#">Home</a></span>
                            <span>{{ $category->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- shop area start -->
    <livewire:frontend.product.index :category="$category" />
    <!-- shop area end -->

@endsection
