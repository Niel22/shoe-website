@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('layouts.inc.admin.flash-message')
            <div class="card">
                <div class="card-header">
                    <h3>Colors
                        <a href="{{ route('color.create') }}" class="btn btn-primary btn-sm float-right">Add Color</a>
                    </h3>
                </div>
                <div class="card-body">
                    <livewire:admin.color.index lazy/>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        window.addEventListener('close-modal', event => {

            $('#deleteModal').modal('hide');

        });
    </script>
@endpush
