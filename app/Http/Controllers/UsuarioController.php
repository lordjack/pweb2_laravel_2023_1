<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
   function index(){
     
        $usuarios = Usuario::All();
       // dd($usuarios);

		return view("UsuarioList")->with(["usuarios"=> $usuarios]);
	 }

     function create(){

        return view("UsuarioForm");
     }
     
     function store(Request $request){
      //dd( $request->nome);
        Usuario::create([
            'nome'=> $request->nome,
            'telefone'=> $request->telefone,
            'email'=> $request->email]);

        return \redirect()->action("App\Http\Controllers\UsuarioController@index");
     }
}
