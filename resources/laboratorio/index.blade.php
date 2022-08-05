{{-- https://toposervis.com.mx/reportes/labs --}}
@extends('layout.app')

@push('plugin-styles')
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Orden de servicios</h4> 
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th data-column-id="folio">Folio</th>
                            <th data-column-id="date" data-order="desc">Fecha de admisión</th>
                            <th data-column-id="customer" data-order="desc">Cliente</th>
                            <th data-column-id="product" data-order="desc">Producto</th>
                            <th data-column-id="product" data-order="desc">Serie</th>
                            <th data-column-id="product" data-order="desc">Marca</th>
                            <th data-column-id="product" data-order="desc">Modelo</th>
                            <th data-column-id="status" data-order="desc">Estatus</th>
                            <th data-column-id="commands" data-formatter="commands" data-sortable="false">
                               <div class="text-left">Acciones</div>
                            </th>
                         </tr>
                    </thead>
                </table>
                <div class="paginate d-flex justify-content-center my-2">
                   
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Últimos registros</h4>
                    <div class="table-responsive">
                        @include('certificaciones._table-docs')
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush