@extends('layout.master-mini')
@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" 
    style="background-image: url(https://demo.toposervis.com.mx/wp-content/themes/toposervis/img/textura-para-fondo-verde.png); background-size: cover;background-color:#103542;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="text-center">
                <img src="https://demo.toposervis.com.mx/wp-content/uploads/2022/03/Toposervis-Logo.png" alt="">
            </div>
            <div class="form-group">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Usuario</label>
                    <div class="input-group">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div class="input-group-append">
                            <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Contraseña</label>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control" name="password" placeholder="*********" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <div class="input-group-append">
                            <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block">Login</button>
            </div>
            <div class="form-group d-flex justify-content-between">
                <a href="#" class="text-small forgot-password text-black">Olvidó su contraseña</a>
            </div>
        </form>
      </div><br>
      <p class="footer-text text-center">Toposervis © 2022. All rights reserved.</p>
    </div>
  </div>
</div>

@endsection
