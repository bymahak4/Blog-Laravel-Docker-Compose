<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <b>Bienvenido <a href="/perfil/{{ Auth::user()->id }}"> {{ Auth::user()->name }} </a>!!! </b> <br> <br><br>
    <a href="/newPost">Crear post</a> <br><br><br>
    @endauth

    @guest 
    <b><a href="/login">Iniciar sesion</a></b><br><br>
    <b><a href="/crearUsuario">Crear usuario</a></b><br><br>
    
    @endguest 


    <head> Publicaciones </head>

    @foreach ($posts as $p)
        @isset(Auth::user()->name)
            @if($p -> autor == Auth::user()->name)
                <a href="/editPost?id={{ $p -> id }}">Editar post</a> <br> <br>
            @endif
        @endisset

        Id: {{ $p -> id}} <br />
        Titulo: {{ $p -> titulo}} <br />
        Autor: {{ $p -> autor}} <br />
        Fecha: {{ $p -> created_at}} <br /> <br />
        {{ $p -> cuerpo }} <br /> <br />

        ----------------------- <br><br>
    @endforeach

    {{ $posts -> links()}}
</body>
</html>