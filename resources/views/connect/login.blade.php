@extends('connect.master')

@section('title','Login')

@section('content')
<div class="box box_login shadow">
		<div class="header">
			<a href="{{ url('/') }}">
				<img src="{{ url('/static/images/logo.png') }}">
			</a>
		</div>
		<div class="inside">
		{!! Form::open(['url' => '/login']) !!}

		@if(Session::has('message'))
			<div class="container">
				<div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
					{{ Session::get('message') }}
					@if($errors->any())
					<ul>
						@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
					@endif
					<script>
						$('.alert').slideDown();
						setTimeout(function(){ $('.alert').slideUp(); }, 10000);
					</script>
				</div>
			</div>
			@endif

		<label for="email">Correo electrónico:</label>
		<div class="input-group">
			 <div class="input-group-prepend">
	          <div class="input-group-text"><i class="far fa-envelope"></i></div>
	        </div>
		{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>

		<label for="password" class="mtop16">Contraseña:</label>
		<div class="input-group">
			 <div class="input-group-prepend">
	          <div class="input-group-text"><i class="fas fa-lock"></i></div>
	        </div>
		{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>

		{!! Form::submit('Ingresar',['class' => 'btn btn-success mtop16']) !!}
		{!! Form::close() !!}



		<div class="footer mtop16">
			<a href="{{ url('/register') }}" id="register">¿No tienes una cuenta?, Registrate</a>
			<a href="{{ url('/recover') }}" id="recover">Recuperar contraseña</a>
		</div>
	</div>


</div>
@stop