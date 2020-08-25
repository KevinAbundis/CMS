@extends('connect.master')

@section('title','Registrarse')

@section('content')
<div class="box box_register shadow">
		<div class="header">
			<a href="{{ url('/') }}">
				<img src="{{ url('/static/images/logo.png') }}">
			</a>
		</div>
		<div class="inside">

		{!! Form::open(['url' => '/register']) !!}

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

		<label for="name">Nombre(s):</label>
		<div class="input-group">
			 <div class="input-group-prepend">
	          <div class="input-group-text"><i class="far fa-user"></i></div>
	        </div>
		{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
		</div>

		<label for="lastname" class="mtop16">Apellido:</label>
		<div class="input-group">
			 <div class="input-group-prepend">
	          <div class="input-group-text"><i class="fas fa-user"></i></div>
	        </div>
		{!! Form::text('lastname', null, ['class' => 'form-control', 'required']) !!}
		</div>

		<label for="email" class="mtop16">Correo electrónico:</label>
		<div class="input-group">
			 <div class="input-group-prepend">
	          <div class="input-group-text"><i class="far fa-envelope"></i></div>
	        </div>
		{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
		</div>

		<label for="password" class="mtop16">Contraseña:</label>
		<div class="input-group">
			 <div class="input-group-prepend">
	          <div class="input-group-text"><i class="fas fa-lock"></i></div>
	        </div>
		{!! Form::password('password', ['class' => 'form-control', 'required']) !!}
		</div>

		<label for="cpassword" class="mtop16">Confirmar Contraseña:</label>
		<div class="input-group">
			 <div class="input-group-prepend">
	          <div class="input-group-text"><i class="fas fa-lock"></i></div>
	        </div>
		{!! Form::password('cpassword', ['class' => 'form-control', 'required']) !!}
		</div>

		{!! Form::submit('Registrarse',['class' => 'btn btn-success mtop16']) !!}

		{!! Form::close() !!}


		<div class="footer mtop16">
			<a href="{{ url('/login') }}">Ya tengo una cuenta, Ingresar</a>
		</div>
	</div>


</div>
@stop