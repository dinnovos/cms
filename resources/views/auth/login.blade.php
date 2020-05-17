@extends('layouts.auth')
@section('content')
  <div class="bg-body-dark bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
      <div class="row mx-0 justify-content-center">
          <div class="hero-static col-lg-6 col-xl-4">
              <div class="content content-full overflow-hidden">
                  <!-- Header -->
                  <div class="py-30 text-center">
                      <h1 class="h4 font-w700 mt-30 mb-10">Bienvendios a</h1>
                      <h2 class="h5 font-w400 text-muted mb-0">{{ setting('project', config('app.name', 'Laravel')) }}</h2>
                  </div>
                  <!-- END Header -->

                  <!-- Sign In Form -->
                  <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
                  <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                  <form method="POST" action="{{ route('auth.user.login.verify') }}" aria-label="{{ __('Login') }}">
                      <div class="block block-themed block-rounded block-shadow">
                          <div class="block-header bg-gd-dusk">
                              <h3 class="block-title">Iniciar Sesi&oacute;n</h3>
                              <div class="block-options">
                                  <button type="button" class="btn-block-option">
                                      <i class="si si-wrench"></i>
                                  </button>
                              </div>
                          </div>
                          <div class="block-content">
                              <div class="form-group row">
                                  <div class="col-12">
                                      <label for="exampleInputEmail1">Correo Electr&oacute;nico</label>
                                      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="usuario@dominio.com">
                                      @if ($errors->has('email'))
                                      <span class="text-danger" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                      @endif   
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-12">
                                      <label for="exampleInputPassword1">Contrase&ntilde;a</label>
                                      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="xxxxx">
                                      @if ($errors->has('password'))
                                      <span class="text-danger" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="form-group row mb-0">
                                  <div class="col-sm-6 d-sm-flex align-items-center push">
                                      <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                                          <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                          <label class="custom-control-label" for="remember">{{ __('Recuerdame') }}</label>
                                      </div>
                                  </div>
                                  <div class="col-sm-6 text-sm-right push">
                                      {{ csrf_field() }}

                                      <button type="submit" class="btn btn-alt-primary">
                                          <i class="si si-login mr-10"></i> Iniciar
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
                  <!-- END Sign In Form -->
              </div>
          </div>
      </div>
  </div>
@endsection