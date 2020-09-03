@extends('admin.master')

@section('title','Productos')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/products') }}"><i class="fas fa-boxes"></i>	Productos</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-boxes"></i>	Productos</h2>
			<ul>
				@if(kvfj(Auth::user()->permissions, 'product_add'))
				<li>
					<a href="{{ url('/admin/product/add') }}">
						<i class="fas fa-plus-circle"></i>	Agregar Producto
					</a>
				</li>
				@endif
				<li>
					<a href="#"> Filtrar <i class="fas fa-angle-down"></i></a>
					<ul>
						<li><a href="{{ url('/admin/products/1') }}"><i class="fas fa-globe-americas"></i> Públicos</a></li>
						<li><a href="{{ url('/admin/products/0') }}"><i class="fas fa-eraser"></i> Borradores</a></li>
						<li><a href="{{ url('/admin/products/trash') }}"><i class="fas fa-trash"></i> Papelera</a></li>
						<li><a href="{{ url('/admin/products/all') }}"><i class="fas fa-list-ul"></i> Todos</a></li>
					</ul>
				</li>
				<li>
					<a href="#">
						<i class="fas fa-search"></i>	Buscar
					</a>
					<ul>
						<li>
							{!! Form::open(['url' => '/admin/products/search']) !!}
							{!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su búsqueda']) !!}
							{!! Form::close() !!}
						</li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="inside">

			<table class="table table-striped">
				<thead>
					<tr>
						<td>ID</td>
						<td></td>
						<td>Nombre</td>
						<td>Categoría</td>
						<td>Precio</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $p)
					<tr>
						<td width="50">{{ $p->id }}</td>
						<td width="50">
							<a href="{{ url('/uploads/'.$p->file_path.'/'.$p->image) }}" data-fancybox="gallery">
								<img src="{{ url('/uploads/'.$p->file_path.'/t_'.$p->image) }}" width="50" >
							</a>
						</td>
						<td>{{ $p->name }} @if($p->status == "0") <i class="fas fa-eraser" data-toggle="tooltip" data-placement="top" title="Estado: Borrador"></i> @endif</td>
						<td>{{ $p->cat->name }}</td>
						<td>{{ $p->price }}</td>
						<td>
							<div class="opts">
								@if(kvfj(Auth::user()->permissions, 'product_edit'))
								<a href="{{ url('/admin/product/'.$p->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
									<i class="fas fa-edit"></i>
								</a>
								@endif

								@if(kvfj(Auth::user()->permissions, 'product_delete'))
								<a href="{{ url('/admin/product/'.$p->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
									<i class="fas fa-trash-alt"></i>
								</a>
								@endif
							</div>
						</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="6">{!! $products->render() !!}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection