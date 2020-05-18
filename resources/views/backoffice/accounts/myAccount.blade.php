@extends('layouts.backoffice')

@section('cssr')
    <style type="text/css">
        .preview-image > .image{
            text-align: center;
        }

        .preview-image > .image img{
            margin: 0 auto;
        }

        #summary{
            height: 150px;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('global-vendor/preview/preview.js') }}" type="text/javascript"></script>

    <script>
        $(function () {
            $(".preview-image").preview({
                allowedTypes: "jpg,jpeg,png",
                pathPreview: '/images/default-image.png'
            });
        })
    </script>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block">
            <div class="block-header block-header-default">

                <h3 class="block-title">
                    Mis datos
                    <small>Actualizar</small>
                </h3>

            </div>
            <div class="block-content">

                {!! Form::open(['route'=>'backoffice.account.updateMyAccount', 'files' => true]) !!}
                <div class="row">
     
                    <div class="col-6">

                        <div class="row">
            				
            				<div class="form-group col-md-12">
                                {!! Form::text('full_name', auth()->user()->full_name, ['class'=>'form-control','placeholder'=>'Full name', 'required']) !!}
                            </div>

                            <div class="form-group col-md-12">
                                {!! Form::email('email', auth()->user()->email, ['class'=>'form-control','placeholder'=>'Email', 'required']) !!}
                            </div>

                            @if((int)auth()->user()->type === 2)
                                <div class="form-group col-md-12">
                                    {!! Form::text('phone', auth()->user()->phone, ['class'=>'form-control','placeholder'=>'Tel&eacute;fono fijo']) !!}
                                    @if ($errors->has('phone'))
                                        <div class="text-danger">{!! $errors->first('phone') !!}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    {!! Form::text('phone_2', auth()->user()->phone_2, ['class'=>'form-control','placeholder'=>'Tel&eacute;fono m&oacute;vil *']) !!}
                                    @if ($errors->has('phone_2'))
                                        <div class="text-danger">{!! $errors->first('phone_2') !!}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    {!! Form::text('rfc', auth()->user()->rfc, ['class'=>'form-control','placeholder'=>'RFC *']) !!}
                                    @if ($errors->has('rfc'))
                                        <div class="text-danger">{!! $errors->first('rfc') !!}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    {!! Form::text('fiscal_address', auth()->user()->fiscal_address, ['class'=>'form-control','placeholder'=>'Direcci&oacute;n fiscal *']) !!}
                                    @if ($errors->has('fiscal_address'))
                                        <div class="text-danger">{!! $errors->first('fiscal_address') !!}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    {!! Form::text('assistant', auth()->user()->assistant, ['class'=>'form-control','placeholder'=>'Nombres del personal al que autoriza para recibir los pedidos']) !!}
                                    @if ($errors->has('assistant'))
                                        <div class="text-danger">{!! $errors->first('assistant') !!}</div>
                                    @endif
                                </div>
                            @endif
            				

                            <div class="form-group col-md-12">
                                {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Contrase&ntilde;a']) !!}
                            </div>

                            <div class="form-group col-md-12">
                                {!! Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>'Contrase&ntilde;a confirmaci&oacute;n']) !!}
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>

                        </div>
                        
                    </div>

                    <div class="col-4">
                        {!! Form::label('image', 'Imagen Principal', ['class' => 'control-label']) !!}
                        <div class="preview-image border-info border text-center" data-field="image" data-image="{{ $image }}"></div>
                        <span class="label label-primary"><i class="fa fa-info-circle" aria-hidden="true"></i> Dimensiones: 400px por 400px</span>

                        @if (session('image'))
                            <p class="text-danger">{!! session('image') !!}</p>
                        @endif
                    </div>

                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
