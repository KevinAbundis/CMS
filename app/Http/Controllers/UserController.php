<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Image, Auth, Config, Str;
use App\User;

class UserController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }


    public function getAccountEdit(){
    	return view('user.account_edit');
    }

    public function postAccountAvatar(Request $request){
    	$rules = [
            'avatar' => 'required',
        ];

        $messages = [
            'avatar.required' => 'Seleccione una imagen.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger')->withInput();
        else:
            if($request->hasFile('avatar')):
                //Esto sirve para guardar la imagen del producto
                $path = '/'.Auth::id();
                $fileExt = trim($request->file('avatar')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads_user.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('avatar')->getClientOriginalName()));

                $filename = rand(1,999).'_'.$name.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$filename;

                $u = User::find(Auth::id());
                $aa = $u->avatar;
                $u->avatar = $filename;

                if($u->save()):
                if($request->hasFile('avatar')):
                    $fl = $request->avatar->storeAs($path, $filename, 'uploads_user');

                    $img = Image::make($file_file);
                    $img->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/av_'.$filename);
                endif;
                unlink($upload_path.'/'.$path.'/'.$aa);
                unlink($upload_path.'/'.$path.'/av_'.$aa);
                return back()->with('message','Avatar actualizado con éxito.')->with('typealert','success');
            endif;
            endif;

        endif;
    }
}
