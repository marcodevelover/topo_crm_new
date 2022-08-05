@extends('layout.app')

@push('plugin-styles')
@endpush
@section('content')
@include('components.messages')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Usuarios</h4> 
                <a href="{{ route('usuarios.create') }}" class="btn btn-dark">Nuevo usuario</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre </th> 
                            <th>Correo </th>
                            <th>Puesto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($users->items() as $user)
                        <tr>
                            <td>{{$user->name}}</td> 
                            <td>{{$user->email}}</td>
                            <td>{{$user->job}}</td>
                            <td>
                                <form method="POST" action="{{route('usuarios.destroy', $user->id)}}"
                                    onsubmit="return confirm('¿Esta seguro de querer eliminar este registro?');"
                                    class="btn-group" 
                                    role="group"
                                >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('usuarios.edit', $user->id ) }}" class="btn btn-info btn-md" title="Editar usuario">
                                        <i class="mdi mdi-pencil-box-outline"></i>
                                    </a>
                                    <button class="btn btn-danger btn-md" 
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar usuario"><i class="mdi mdi-delete"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate d-flex justify-content-center my-2">
                    {{ $users->links( "pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush