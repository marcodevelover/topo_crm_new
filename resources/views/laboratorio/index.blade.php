{{-- https://toposervis.com.mx/reportes/labs --}}
@extends('layout.app')

@push('plugin-styles')
@endpush

@section('content')
<?php $base_url = URL::to('/'); ?>
    @include('components.filter', [ 'route'=>'lab-buscar'] )
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Orden de servicios</h4> 
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th data-column-id="commands">
                                <div class="text-left">#</div>
                             </th>
                            <th data-column-id="folio">Folio</th>
                            <th data-column-id="date">Fecha de admisión</th>
                            <th data-column-id="customer">Cliente</th>
                            <th data-column-id="product">Producto</th>
                            <th data-column-id="product">Serie</th>
                            <th data-column-id="product">Marca</th>
                            <th data-column-id="product">Modelo</th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach ($labs as $lab)
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button 
                                            class="btn btn-success dropdown-toggle" 
                                            type="button" 
                                            id="dropcert" 
                                            data-toggle="dropdown" 
                                            aria-haspopup="true" 
                                            aria-expanded="false" 
                                            title="Certificar"
                                        >
                                            <i class="mdi mdi-certificate"></i>
                                        </button>
                                        {{-- @if( Auth::user()->rol == 'Administrador' ) --}}
                                            <div class="dropdown-menu" aria-labelledby="dropcert">
                                                <a class="dropdown-item" href="{{ $base_url.'/certificado-nivel/'. $lab->id}}/?pattern=1">Nivel</a>
                                                <!-- <a class="dropdown-item" href="{{ $base_url.'/certificado-nivel/'. $lab->id}}/?pattern=2">Estación</a> -->
                                                <a class="dropdown-item" href="{{ route('certificaciones.create') }}">Estación</a>
                                            </div>
                                        {{-- @endif --}}
                                    </div>
                                </div>
                             </td>
                            <td>{{ $lab->folio }}</td>
                            <td>{{ date('d M, Y', strtotime($lab->date_admission)) }}</td>
                            <td>{{ $lab->customer->name }}</td>
                            <td>{{ $lab->product->name }} </td>
                            <td>{{ $lab->serie }} </td>
                            <td>{{ $lab->brand }} </td>
                            <td>{{ $lab->model }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate d-flex justify-content-center mt-4">
                   {{ $labs->links( "pagination::bootstrap-4" ) }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush