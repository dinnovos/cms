@extends('layouts.auth')

@section('content')

  <div class="bg-body-dark bg-pattern">
      <div class="row mx-0 justify-content-center">
          <div class="hero-static col-lg-6 col-xl-4">
              <div class="content content-full overflow-hidden">
                    <!-- Header -->
                    <div class="py-30 text-center">
                      <h1 class="h4 font-w700 mt-30 mb-10">{!! setting('project', config('app.name', 'Laravel')) !!}</h1>
                    </div>
                    <!-- END Header -->

                    <form class="js-validation-signup" action="{{ route('auth.user.register.create') }}" method="post">

                        @csrf
                        
                        <div class="block block-themed block-rounded block-shadow">
                            <div class="block-header bg-primary-light">
                                <h3 class="block-title">Registro de usuario</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option">
                                        <i class="si si-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="signup-fullname">Nombre completo</label>
                                        <input type="text" class="form-control" id="signup-fullname" name="full_name" placeholder="Ej: John Smith">
                                        @if ($errors->has('full_name'))
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('full_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="signup-email">E-mail</label>
                                        <input type="email" class="form-control" id="signup-email" name="signup-email" placeholder="Ej: john@example.com">
                                        @if ($errors->has('email'))
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="signup-password">Contrase&ntilde;a</label>
                                        <input type="password" class="form-control" id="signup-password" name="signup-password" placeholder="********">
                                        @if ($errors->has('password'))
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="signup-password-confirm">Confirmaci&oacute;n de contrase&ntilde;a</label>
                                        <input type="password" class="form-control" id="signup-password-confirm" name="signup-password-confirm" placeholder="********">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>                                

                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms">
                                            <label class="custom-control-label" for="signup-terms">T&eacute;rminos y condiciones</label>

                                            @if ($errors->has('terms'))
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $errors->first('terms') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-alt-success">
                                            <i class="fa fa-plus mr-10"></i> Registrarme
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block-content bg-body-light">
                                <div class="form-group text-center">
                                    <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="#" data-toggle="modal" data-target="#modal-terms">
                                        <i class="fa fa-book text-muted mr-5"></i> Leer t&eacute;rminos y condiciones
                                    </a>
                                    <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route("auth.user.login.show") }}">
                                        <i class="fa fa-user text-muted mr-5"></i> Iniciar sesi&oacute;n
                                    </a>
                                </div>
                            </div>

                        </div>
                </form>
              </div>
          </div>
      </div>
  </div>

@endsection