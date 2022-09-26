@extends('layout.app')

@push('plugin-styles')
@endpush

@section('content')
<style>
    #exampleModal .modal-lg{
        max-width: 60%;
    }
    #productModal .modal-lg{
        max-width: 80%;
    }
    #productModal tbody tr td:first-child{
        width: 80px;
    }
    #productModal tbody tr td:nth-of-type(2){
        width: 180px;
    }
    #productModal tbody tr td:nth-of-type(3){
        width: 200px;
    }
</style>
    <div class="col-12 d-flex">
        <h4 class="mb-4">Editar registro</h4>
        <a class="btn btn-success btn-md font-weight-bold">Generar PDF</a>
    </div>
    @include('certificaciones._modal-customer')
    @include('certificaciones._modal-product')
    <form action="{{ route('certificaciones.update',$report->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        @include('laboratorio._form')
    </form>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush