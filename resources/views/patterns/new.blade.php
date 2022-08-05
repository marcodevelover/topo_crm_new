@extends('layout.app')

@push('plugin-styles')
@endpush

@section('content')
<form action="{{ route('patrones.store')}}" method="post">
    @include('patterns._form')
</form>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush