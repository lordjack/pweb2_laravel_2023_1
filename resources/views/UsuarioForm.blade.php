<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  @php
    if(!empty(Request::route('id'))){
        $action = action("App\Http\Controllers\UsuarioController@update",$usuario->id);
    } else {
        $action = action("App\Http\Controllers\UsuarioController@store");
    }
  @endphp
  <body>
    <div class="container">
      <h1>Formulário Usuário</h1>
        <form action='{{ $action }}' method="POST">
            @csrf
            <input type="hidden" name="id" value="@if(!empty($usuario->id)) {{$usuario->id}} @else {{''}} @endif"  /><br>
            <div class="col-3">
              <label class="form-label">Nome</label><br>
              <input type="text" class="form-control" name="nome" value="@if(!empty($usuario->nome)) {{$usuario->nome}} @else {{''}} @endif" /><br>
            </div>
            <div class="col-3">
             <label class="form-label">Telefone</label><br>
                <input type="text" class="form-control" name="telefone" value="@if(!empty($usuario->telefone)) {{$usuario->telefone}} @else {{''}} @endif" /><br>
            </div>
            <div class="col-3">
             <label class="form-label">E-mail</label><br>
                <input type="email" class="form-control" name="email" value="@if(!empty($usuario->email)) {{$usuario->email}} @else {{''}} @endif" /><br>
            </div>
            <button class="btn btn-success" type="submit">
            <i class="fa-solid fa-save"></i> Salvar
          </button>
            <a href='{{action("App\Http\Controllers\UsuarioController@index")}}' class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
        </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>
