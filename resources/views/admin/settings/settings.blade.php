@extends('admin.master')

@section('title','Configuraciones')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/settings') }}"><i class="fas fa-cogs"></i>	Configuraciones</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-cogs"></i>	Configuraciones</h2>
		</div>

		<div class="inside">
			{!! Form::open(['url' => '/admin/settings']) !!}
			<div class="row">
				<div class="col-md-4 ">
						<label for="name">Nombre de la tienda: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('name', Config::get('cms.name'), ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4 ">
						<label for="currency">Moneda: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('currency', Config::get('cms.currency'), ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4 ">
						<label for="company_phone">Teléfono: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::number('company_phone', Config::get('cms.company_phone'), ['class' => 'form-control'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-4 ">
						<label for="map">Ubicaciones: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('map', Config::get('cms.map'), ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-3">
					<label for="maintenance_mode">Modo mantenimiento: </label>
					<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::select('maintenance_mode', ['0' => 'Desactivado', '1' => 'Activado'], Config::get('cms.maintenance_mode'), ['class' => 'form-select'])!!}
						</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-4 ">
						<label for="products_per_page">Productos a mostrar por página: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('products_per_page', Config::get('cms.products_per_page'), ['class' => 'form-control'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-12">
					{!!Form::submit('Guardar', ['class' => 'btn btn-success'])!!}
				</div>
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection