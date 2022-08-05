@extends('layout.app')

@push('plugin-styles')
@endpush

@section('content')
<form action="{{ route('patrones.update',$pattern->id)}}" method="post">
    {{ method_field('PUT') }}
    @include('patterns._form')
</form>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush