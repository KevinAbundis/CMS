<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Category, App\Http\Models\Product;
use Validator, Str, Config, Image;

class ProductsController extends Controller
{
     public function __Contruct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
    }

    public function getHome(){
        $products = Product::with(['cat'])->orderBy('id', 'desc')->paginate(25);
        $data = ['products' => $products];
    	return view('admin.products.home', $data);
    }

     public function getProductAdd(){
        $cats = Category::where('module', '0')->pluck('name', 'id');
        $data = ['cats' => $cats];
    	return view('admin.products.add', $data);
    }

    public function postProductAdd(Request $request){
        $rules = [
            'name' => 'required',
            'img' => 'required',
            // 'img' => 'required|image',
            'price' => 'required',
            'content' => 'required'
        ];

        $messages = [
            'name.required' => 'El nombre del producto es requerido.',
            'img.required' => 'Seleccione una imagen para el producto.',
            'img.image' => 'El archivo no es una imagen.',
            'price.required' => 'El precio del producto es requerido.',
            'content.required' => 'La descripción del producto es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger')->withInput();
        else:
            //Esto sirve para guardar la imagen del producto
            $path = '/'.date('Y-m-d'); //2020-02-14
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));

            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file = $upload_path.'/'.$path.'/'.$filename;

            //////////////////////////////////////////////////////////
            //Variables que se guardarán en la base de datos
            $product = new Product;
            $product->status = '0';
            $product->name = e($request->input('name'));
            $product->slug = Str::slug($request->input('name'));
            $product->category_id = $request->input('category');
            $product->file_path = date('Y-m-d');
            $product->image = $filename;
            $product->price = $request->input('price');
            $product->in_discount = $request->input('indiscount');
            $product->discount = $request->input('discount');
            $product->content = e($request->input('content'));


            if($product->save()):
                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');

                    $img = Image::make($file_file);
                    $img->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                return redirect('/admin/products')->with('message','Producto guardado con éxito.')->with('typealert','success');
            endif;


            // $c = new Category;
            // $c->module = $request->input('module');
            // $c->name = e($request->input('name'));
            // $c->slug = Str::slug($request->input('name'));
            // $c->icono = e($request->input('icon'));
            // if($c->save()):
            //     return back()->with('message','Guardado con éxito.')->with('typealert','success');
            // endif;

        endif;
    }

    public function getProductEdit($id){
        $p = Product::find($id);
        $cats = Category::where('module', '0')->pluck('name', 'id');
        $data = ['cats' => $cats, 'p' => $p];
        return view('admin.products.edit', $data);
    }

     public function postProductEdit($id, Request $request){
        $rules = [
            'name' => 'required',
            //'img' => 'required',
            // 'img' => 'required|image',
            'price' => 'required',
            'content' => 'required'
        ];

        $messages = [
            'name.required' => 'El nombre del producto es requerido.',
            'img.image' => 'El archivo no es una imagen.',
            'price.required' => 'El precio del producto es requerido.',
            'content.required' => 'La descripción del producto es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger')->withInput();
        else:


            //////////////////////////////////////////////////////////
            //Variables que se guardarán en la base de datos
            $product = Product::find($id);
            $product->status = $request->input('status');
            $product->name = e($request->input('name'));
            //$product->slug = Str::slug($request->input('name'));
            $product->category_id = $request->input('category');
            if($request->hasFile('img')):
                //Esto sirve para guardar la imagen del producto
                $path = '/'.date('Y-m-d'); //2020-02-14
                $fileExt = trim($request->file('img')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$filename;
                $product->file_path = date('Y-m-d');
                $product->image = $filename;
            endif;
            $product->price = $request->input('price');
            $product->in_discount = $request->input('indiscount');
            $product->discount = $request->input('discount');
            $product->content = e($request->input('content'));


            if($product->save()):
                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');

                    $img = Image::make($file_file);
                    $img->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                return back()->with('message','Producto actualizado con éxito.')->with('typealert','success');
            endif;

        endif;
    }
}
