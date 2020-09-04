<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
    	$this->middleware('isadmin');
    }

    public function getUsers($status){
        if($status == 'all'):
    	   $users = User::orderBy('id', 'Desc')->paginate(25);
        else:
            $users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(25);
        endif;
    	$data = ['users' => $users];
    	return view('admin.users.home', $data);
    }

    public function getUserEdit($id){
    	$u = User::findOrFail($id);
    	$data = ['u' => $u];
    	return view('admin.users.user_edit', $data);
    }

    public function postUserEdit(Request $request, $id){
        $u = User::findOrFail($id);
        $u->role = $request->input('user_type');

        if($request->input('user_type') == "1"):
            if(is_null($u->permissions)):
                $u->permissions = $permissions = [
                    'dashboard' => true,
                ];
                $permissions = json_encode($permissions);
                $u->permissions = $permissions;
            endif;
        else:
            $u->permissions = null;
        endif;

        if($u->save()):
            if($request->input('user_type') == "1"):
                return redirect('/admin/user/'.$u->id.'/permissions')->with('message', 'El rol del usuario ha sido actualizado con éxito.')->with('typealert','success');
            else:
                return back()->with('message', 'El rol del usuario ha sido actualizado con éxito.')->with('typealert','success');
            endif;
        endif;
    }

    public function getUserBanned($id){
        $u = User::findOrFail($id);
        if($u->status == "100"):
            $u->status = "0";
            $msg = "Usuario activado nuevamente con éxito.";
        else:
            $u->status = "100";
            $msg = "Usuario suspendido con éxito.";
        endif;

        if($u->save()):
            return back()->with('message',$msg)->with('typealert','success');
        endif;
    }

    public function getUserPermissions($id){
        $u = User::findOrFail($id);
        $data = ['u' => $u];
        return view('admin.users.user_permissions', $data);
    }

    public function postUserPermissions(Request $request, $id){
        $u = User::findOrFail($id);
        $permissions = [
            'dashboard' => $request->input('dashboard'),
            'dashboard_small_stats' => $request->input('dashboard_small_stats'),
            'dashboard_sell_today' => $request->input('dashboard_sell_today'),
            'products' => $request->input('products'),
            'product_add' => $request->input('product_add'),
            'product_edit' => $request->input('product_edit'),
            'product_search' => $request->input('product_search'),
            'product_delete' => $request->input('product_delete'),
            'product_gallery_add' => $request->input('product_gallery_add'),
            'product_gallery_delete' => $request->input('product_gallery_delete'),
            'categories' => $request->input('categories'),
            'category_add' => $request->input('category_add'),
            'category_edit' => $request->input('category_edit'),
            'category_delete' => $request->input('category_delete'),
            'user_list' => $request->input('user_list'),
            'user_edit' => $request->input('user_edit'),
            'user_banned' => $request->input('user_banned'),
            'user_permissions' => $request->input('user_permissions'),
        ];
        $permissions = json_encode($permissions);
        $u->permissions = $permissions;

        if($u->save()):
            return back()->with('message', 'Los permisos del usuario fueron actualizados con éxito.')->with('typealert','success');
        endif;
    }
}
