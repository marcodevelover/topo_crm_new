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
    <div class="col-12 d-flex justify-content-between">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h4 class="mb-4">Editar registro | Última edición <span class="badge badge-info">{{ strftime("%d %B de %Y", strtotime($report->updated_at)) }}</span></h4>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 wrap-btns text-right">
            <div class="btn btn-info btn-md font-weight-bold" data-bs-toggle="modal" data-bs-target="#patterbModal">Patrón de referencia</div>
            <a class="btn btn-success btn-md font-weight-bold text-white" href="{{ route('cdc-toposervis', $report->folio) }}" target="_blank">Generar PDF</a>
            
        </div>
    </div>
    @include('certificaciones._modal-customer')
    @include('certificaciones._modal-product')
    <form action="{{ route('certificaciones.update',$report->id) }}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        @include('certificaciones._form')
    </form>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush