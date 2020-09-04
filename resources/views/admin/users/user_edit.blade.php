@extends('admin.master')

@section('title','Editar Usuario')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users') }}"><i class="fas fa-user-friends"></i>	Usuarios</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="page_user">
		<div class="row">
		<div class="col-md-4">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-user"></i>	Información</h2>
				</div>

				<div class="inside">
					<div class="mini_profile">
						@if(is_null($u->avatar))
						<img src="{{ url('/static/images/avatar.png') }}" class="avatar">
						@else
						<img src="{{ url('/uploads/user/'.$u->id.'/'.$user->avatar) }}" class="avatar">
						@endif
						<div class="info">
							<span class="title"><i class="far fa-address-card"></i> Nombre:</span>
							<span class="text">{{ $u->name }} {{ $u->lastname }}</span>

							<span class="title"><i class="fas fa-chalkboard-teacher"></i> Estado del Usuario:</span>
							<span class="text">{{ getUserStatusArray(null,$u->status) }}</span>

							<span class="title"><i class="far fa-envelope"></i> Correo Electrónico:</span>
							<span class="text">{{ $u->email }}</span>

							<span class="title"><i class="far fa-calendar-alt"></i> Fecha de Registro:</span>
							<span class="text">{{ $u->created_at }}</span>

							<span class="title"><i class="far fa-id-badge"></i> Role de Usuario:</span>
							<span class="text">{{ getRoleUserArray(null,$u->role) }}</span>

						</div>
						@if(kvfj(Auth::user()->permissions, 'user_banned'))
							@if($u->status == '100')
							<a href="{{ url('/admin/user/'.$u->id.'/banned') }}" class="btn btn-success">Activar Usuario</a>
							@else
							<a href="{{ url('/admin/user/'.$u->id.'/banned') }}" class="btn btn-danger">Suspender Usuario</a>
							@endif
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-user-edit"></i>	Editar Información</h2>
				</div>

				<div class="inside">
					@if(kvfj(Auth::user()->permissions, 'user_edit'))
					{!! Form::open(['url' => '/admin/user/'.$u->id.'/edit']) !!}

					<div class="row">
						<div class="col-md-6">
							<label for="module">Tipo de Usuario: </label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="fas fa-keyboard"></i>
									</span>
								</div>
								{!!Form::select('user_type', getRoleUserArray('list', null), $u->role, ['class' => 'custom-select'])!!}
							</div>
						</div>
					</div>

					<div class="row mtop16">
						<div class="col-md-12">
							{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
						</div>
					</div>
					{!! Form::close() !!}
					@endif
				</div>
			</div>


		</div>
		</div>
	</div>

</div>
@endsection