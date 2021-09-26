<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @isset($error)
    <div style="color: #FF0000">
        Usuario o password invalidos.
    </div>
    @endisset
    

    @isset($post)
    <form action="/editPost" method="post">

        Titulo <input type="text" value="{{ $post -> titulo }}" name="titulo"> <br> 
        Cuerpo <input type="textarea" value="{{ $post -> cuerpo }}" name="cuerpo">
        <input type="hidden" name="id" value="{{ $post -> id }}">
    @else
    <form action="/newPost" method="post">

        Titulo <input type="text" name="titulo"> <br> 
        Cuerpo <input type="textarea" name="cuerpo">
    @endif
    @csrf 
    <br>
    <input type="submit" value="Enviar">
    </form>
</body>
</html>