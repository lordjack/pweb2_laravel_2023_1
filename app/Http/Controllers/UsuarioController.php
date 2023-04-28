<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Categoria;

class UsuarioController extends Controller
{
   function index(){

        $usuarios = Usuario::All();
       // dd($usuarios);

		return view("UsuarioList")->with(["usuarios"=> $usuarios]);
	 }

    function create(){
        $categorias = Categoria::orderBy('nome')->get();

        return view("UsuarioForm")->with(["categorias"=> $categorias]);
     }

     function store(Request $request){

        $request->validate([
            'nome'=>"required | max: 120",
            'telefone'=>"required | max: 20",
            'email'=>" nullable | email | max: 100",
        ],
        [
            'nome.required'=>"O nome é obrigatório",
            'nome.max'=>"Só é permitido 120 caracteres",
            'telefone.required'=>"O telefone é obrigatório",
            'telefone.max'=>"Só é permitido 20 caracteres",
            'email.max'=>"Só é permitido 100 caracteres",
        ]);

      //dd( $request->nome);
        Usuario::create([
            'nome'=> $request->nome,
            'telefone'=> $request->telefone,
            'email'=> $request->email]);

        return \redirect()->action("App\Http\Controllers\UsuarioController@index");
     }

    function edit($id){
        //select * from usuario where id = $id;
        $usuario = Usuario::findOrFail($id);
        //dd($usuario);
        $categorias = Categoria::orderBy('nome')->get();

        return view("UsuarioForm")->with([
            'usuario'=> $usuario,
            "categorias"=> $categorias
        ]);
     }

    function update(Request $request){
        //dd( $request->nome);
        $request->validate([
            'nome'=>"required | max: 120",
            'telefone'=>"required | max: 20",
            'email'=>" nullable | email | max: 100",
        ],
        [
            'nome.required'=>"O nome é obrigatório",
            'nome.max'=>"Só é permitido 120 caracteres",
            'telefone.required'=>"O telefone é obrigatório",
            'telefone.max'=>"Só é permitido 20 caracteres",
            'email.max'=>"Só é permitido 100 caracteres",
        ]);
          Usuario::updateOrCreate(['id'=>$request->id], [
              'nome'=> $request->nome,
              'telefone'=> $request->telefone,
              'email'=> $request->email]);

        return \redirect()->action("App\Http\Controllers\UsuarioController@index");
    }
//

     function destroy($id){
        $usuario = Usuario::findOrFail($id);

        $usuario->delete();

        return \redirect()->action("App\Http\Controllers\UsuarioController@index");
     }

     function search(Request $request){

        if($request->campo == "nome"){
            $usuarios = Usuario::where('nome', 'like','%'.$request->valor.'%')->get();
        } else {
            $usuarios = Usuario::all();
        }

        //dd($usuarios);
		return view("UsuarioList")->with(["usuarios"=> $usuarios]);
	 }


}
