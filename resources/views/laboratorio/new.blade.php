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
    @media(min-width:768px){
        .wrap-btns{
            text-align: right;
        }
    }
</style>
@include('components.validate-errors')
@include('components.messages')



    <div class="row mb-4">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <h4 class="mb-2">Nuevo registro</h4>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 wrap-btns">
            <div class="btn btn-info btn-md font-weight-bold" data-bs-toggle="modal" data-bs-target="#patterbModal">Patrón de referencia</div>
      
        </div>
    </div>
    <form action="{{ route('certificaciones.store') }}" method="post">
        @include('laboratorio._form')
    </form>


    

@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush