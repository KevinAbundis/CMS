<div class="sidebar shadow">
	<div class="section-top">
		<div class="logo">
			<img src="{{ url('static/images/logo.png') }}" class="img-fluid">
		</div>
		<div class="user">
			<span class="subtitle">Hola:</span>
			<div class="name">
				{{ Auth::user()->name }}	{{ Auth::user()->lastname }}
				<a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Salir">
					<i class="fas fa-sign-out-alt"></i>
				</a>
			</div>
			<div class="email">{{ Auth::user()->email }}</div>
		</div>
	</div>

	<div class="main">
		<ul>
			@if(kvfj(Auth::user()->permissions, 'dashboard'))
			<li>
				<a href="{{ url('/admin') }}" class="lk-dashboard"><i class="fas fa-home"></i>Dashboard</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permissions, 'products'))
			<li>
				<a href="{{ url('/admin/products') }}" class="lk-products lk-product_add lk-product_edit lk-product_gallery_add"><i class="fas fa-boxes"></i>Productos</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permissions, 'categories'))
			<li>
				<a href="{{ url('/admin/categories/0') }}" class="lk-categories lk-category_add lk-category_edit lk-category_delete"><i class="fas fa-folder-open"></i>Categorías</a>
			</li>
			@endif
			@if(kvfj(Auth::user()->permissions, 'user_list'))
			<li>
				<a href="{{ url('/admin/users/all') }}" class="lk-user_list lk-user_edit lk-user_banned"><i class="fas fa-user-friends"></i>Usuarios</a>
			</li>
			@endif
		</ul>
	</div>
</div>