<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
   function index(){

        Usuario::create([
            'nome'=>'Jackson',
            'telefone'=>'84 98866-5500',
            'email'=>'lordjackson@gmail.com']);
        $usuarios = Usuario::All();
       // dd($usuarios);

		return view("UsuarioList")->with(["usuarios"=> $usuarios]);
	 }
}
