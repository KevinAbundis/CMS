@extends('emails.master')
@section('content')
<p>Hola: <strong>{{ $name }}</strong></p>
<p>Esta es la nueva contraseña para tu cuenta en nuestra plataforma.</p>
<p><h2>{{ $password }}</h2></p>
<p>Para iniciar sesión haga clic en el siguiente botón: </p>
<p><a href="{{ url('/login') }}" style="display: inline-block; background-color: #e65100; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none;">Iniciar Sesión</a></p>
<p>Si el botón anterior no le funciona, copie y pegue la siguiente URL en su navegador:</p>
<p>{{ url('/login') }}</p>
@stop