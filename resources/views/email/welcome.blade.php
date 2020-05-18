@extends('layouts.email')

@section('content')
    <section class="row">
        <div class="pull-left">
            Hola, <strong>{!! $user->full_name !!}</strong>

            <p>Le damos la bienvenido a nuestra tienda en linea. </p>
            <p>Por favor, confime su cuenta de correo haciendo clic en el siguiente enlace:</p>

            <p><a href="{{ route("auth.user.register.email.confirmation", ["token" => $user->email_token]) }}">{{ route("auth.user.register.email.confirmation", ["token" => $user->email_token]) }}</a></p>
        </div>
    </section>
@endsection