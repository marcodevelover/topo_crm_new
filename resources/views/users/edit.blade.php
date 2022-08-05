@extends('layout.app')

@push('plugin-styles')
@endpush

@section('content')
    <form action="{{ route('usuarios.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @include('users._form')
    </form>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush