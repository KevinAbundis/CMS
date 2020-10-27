@extends('admin.master')

@section('title','Categorías')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/categories') }}"><i class="fas fa-folder-open"></i>	Categorías</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 d-flex">
			<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-edit"></i>	Editar Categoría</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/category/'.$cat->id.'/edit', 'files' => true]) !!}
				<label for="name">Nombre: </label>
								<div class="input-group">
			    						<span class="input-group-text" id="basic-addon1">
			    							<i class="fas fa-keyboard"></i>
			    						</span>
								{!!Form::text('name', $cat->name, ['class' => 'form-control'])!!}
							</div>

				<label for="module" class="mtop16">Módulo: </label>
								<div class="input-group">
			    						<span class="input-group-text" id="basic-addon1">
			    							<i class="fas fa-keyboard"></i>
			    						</span>
								{!!Form::select('module', getModulesArray(), $cat->module, ['class' => 'form-select'])!!}
							</div>

				<label for="icon" class="mtop16">Icono: </label>
								<div class="form-file">
									{!!Form::file('icon', ['class' => 'form-file-input', 'id' => 'customFile',  'accept' => 'image/*']) !!}
									<label class="form-file-label" for="customFile">
										<span class="form-file-text">Choose file...</span>
										<span class="form-file-button">Browse</span>
									</label>
								</div>
					{!!Form::submit('Guardar', ['class' => 'btn btn-success mtop16'])!!}
			{!!Form::close()!!}
		</div>
	</div>
		</div>

		@if(!is_null($cat->icono))
			<div class="col-md-3 d-flex">
			<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-edit"></i>	Icono</h2>
		</div>

		<div class="inside">
			<img src="{{url('/uploads/'.$cat->file_path.'/'.$cat->icono)}}" class="img-fluid">
		</div>
	</div>
		</div>
		@endif


	</div>
</div>
@endsection