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
	];

	return $p;
}
