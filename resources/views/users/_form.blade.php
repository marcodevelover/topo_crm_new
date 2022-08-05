<input type="hidden" name="_token" value="{{ csrf_token() }}">
@include('components.validate-errors')
@include('components.validate-errors')
@include('components.messages')
<div class="card">
    <div class="card-header">
        {{ ( $user->id > 0 ? 'Editar':'Nuevo' ) }} usuario
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 col-md-8 col-lg-8">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control" 
                    value="{{ old( 'name', $user->name ) }}"
                >
                <label for="">Correo elétronico</label>
                <input type="text" name="email" class="form-control" 
                    value="{{ old( 'email', $user->email ) }}"
                >
                <label for="">Puesto</label>
                <input type="text" name="job" class="form-control" 
                    value="{{ old( 'job', $user->job ) }}"
                >
                <label for="">Contraseña</label>
                <input type="text" name="password" class="form-control" value="">
                <br>
                <div class="mb-4">
                    <label for="check1"> <input id="check1" type="radio" name="rol" value="Administrador" {{ $user->rol == 'Administrador' ? 'checked' : '' }}> Administrador </label>
                    <label for="check2"> <input id="check2" type="radio" name="rol" value="Usuario" {{ $user->rol != 'Administrador' ? 'checked' : ''}}> Usuario </label>
                </div>
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-primary btn-lg font-weight-medium">Guardar</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-primary btn-lg  font-weight-medium">Regresar</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                @if( $user->signed != 'default.png' )
                    <img src="{{ Storage::url($user->signed)}}" class="img-fluid" style="width:100%;">
                @endif
                <span id="auxsigned" class="btn btn-dark btn-lg btn-fw"><i class="mdi mdi-upload"></i>Cargar Firma</span>
                <input id="signed" type="file" name="signed" class="form-control" accept="image/png, image/jpeg, image/jpg" style="display:none;">
            </div>
        </div>
    </div>
</div>