@extends('layout.app')

@push('plugin-styles')
@endpush

@section('content')

    <form action="{{ route('usuarios.store')}}" method="POST" enctype="multipart/form-data">
        @include('users._form')
    </form>

@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush


