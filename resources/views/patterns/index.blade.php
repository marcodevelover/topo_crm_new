@extends('layout.app')

@push('plugin-styles')
@endpush

@section('content')
@include('components.messages')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Patrones de referencia</h4> 
                <a href="{{ route('patrones.create') }}" class="btn btn-dark">Nuevo registro</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Certificado</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>No. Serie</th>
                            <th>Acciones</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($patterns->items() as $pattern)
                        <tr>
                            <td>{{$pattern->certificate}}</td>
                            <td>{{$pattern->brand}}</td>
                            <td>{{$pattern->model}}</td>
                            <td>{{$pattern->no_serie}}</td>
                            <td>{{$pattern->calibrated}}</td>
                            <td>
                                @if( Auth::user()->rol == 'admin' )
                                    <form method="POST" action="{{route('patrones.destroy', $pattern->id)}}"
                                        onsubmit="return confirm('¿Esta seguro de querer eliminar este registro?');"
                                        class="btn-group" 
                                        role="group"
                                    >
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        {{ method_field('DELETE') }}
                                        <a href="{{ route('patrones.edit', $pattern->id ) }}" class="btn btn-info btn-md" title="Editar usuario">
                                            <i class="mdi mdi-pencil-box-outline"></i>
                                        </a>
                                        <button class="btn btn-danger btn-md" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar usuario"><i class="mdi mdi-delete"></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate d-flex justify-content-center my-2">
                    {{ $patterns->links( "pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush