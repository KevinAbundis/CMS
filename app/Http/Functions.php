<?php

//Key Value From JSON
function kvfj($json, $key){
	if($json == null):
		return null;
	else:
		$json = $json;
		$json =json_decode($json, true);
		if(array_key_exists($key, $json)):
			return $json[$key];
		else:
			return null;
		endif;
	endif;
}

function getModulesArray(){
	$a = [
		'0' => 'Productos',
		'1' => 'Blog'
	];

	return $a;
}

function getRoleUserArray($mode, $id){
	$roles = [
		'0' => 'Usuario Normal',
		'1' => 'Administrador'
	];
	if(!is_null($mode)):
		return $roles;
	else:
		return $roles[$id];
	endif;
}

function getUserStatusArray($mode, $id){
	$status = [
		'0' => 'Registrado',
		'1' => 'Verificado',
		'100' => 'Baneado'
	];

	if(!is_null($mode)):
		return $status;
	else:
		return $status[$id];
	endif;
}

function user_permissions(){
	$p = [

		'dashboard' => [
			'icon' => '<i class="fas fa-home"></i>',
			'title' => 'Módulo de Dashboard',
			'keys' =>[
				'dashboard' => 'Puede ver el dashboard.',
				'dashboard_small_stats' => 'Puede ver las estadísticas rápidas.',
				'dashboard_sell_today' => 'Puede ver lo facturado hoy.',
			]
		],

		'products' => [
			'icon' => '<i class="fas fa-boxes"></i>',
			'title' => 'Módulo de Productos',
			'keys' =>[
				'products' => 'Puede ver el listado de productos.',
				'product_add' => 'Puede agregar nuevos productos.',
				'product_edit' => 'Puede editar productos.',
				'product_search' => 'Puede buscar productos.',
				'product_delete' => 'Puede eliminar productos.',
				'product_gallery_add' => 'Puede agregar imágenes a la galería.',
				'product_gallery_delete' => 'Puede eliminar imágenes a la galería.',
			]
		],

		'categories' => [
			'icon' => '<i class="fas fa-folder-open"></i>',
			'title' => 'Módulo de Categorías',
			'keys' =>[
				'categories' => 'Puede ver el listado de categorías.',
				'category_add' => 'Puede crear nuevas categorías.',
				'category_edit' => 'Puede editar las categorías.',
				'category_delete' => 'Puede eliminar las categorías.',
			]
		],

		'users' => [
			'icon' => '<i class="fas fa-user-friends"></i>',
			'title' => 'Módulo de Usuarios',
			'keys' =>[
				'user_list' => 'Puede ver el listado de usuarios.',
				'user_edit' => 'Puede editar los usuarios.',
				'user_banned' => 'Puede suspender los usuarios.',
				'user_permissions' => 'Puede administrar permisos de usuarios.',
			]
		],

		'sliders' => [
			'icon' => '<i class="fas fa-images"></i>',
			'title' => 'Módulo de Sliders',
			'keys' =>[
				'sliders_list' => 'Puede ver la lista de Sliders.',
				'slider_add' => 'Puede crear Sliders.',
				'slider_edit' => 'Puede editar Sliders.',
				'slider_delete' => 'Puede eliminar Sliders.',
			]
		],

		'config' => [
			'icon' => '<i class="fas fa-cogs"></i>',
			'title' => 'Módulo de Configuraciones',
			'keys' =>[
				'settings' => 'Puede modificar la configuración.',
			]
		],

		'orders' => [
			'icon' => '<i class="fas fa-clipboard-list"></i>',
			'title' => 'Módulo de Órdenes',
			'keys' =>[
				'orders_list' => 'Puede ver el listado de órdenes.',
			]
		],

	];

	return $p;
}

function getUserYears(){
	$ya = date('Y');
	$ym = $ya - 18;
	$yo = $ym - 62;

	return [$ym, $yo];
}


function getMonths($mode, $key){
	$m = [
		'01' => 'Enero',
		'02' => 'Febrero',
		'03' => 'Marzo',
		'04' => 'Abril',
		'05' => 'Mayo',
		'06' => 'Junio',
		'07' => 'Julio',
		'08' => 'Agosto',
		'09' => 'Septiembre',
		'10' => 'Octubre',
		'11' => 'Noviembre',
		'12' => 'Diciembre'
	];

	if($mode == "list"){
		return $m;
	}else{
		return $m[$key];
	}


}