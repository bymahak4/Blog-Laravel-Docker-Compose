<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    
    <form enctype="multipart/form-data" action="/crearUsuario" method="post">
        Nombre de usuario <input type="text" name="nombreUsuario"> <br>
        Password <input type="password" name="password">

        <br><br>
        Nombre <input type="text" name="nombre"> <br> 
        Apellido <input type="text" name="apellido"> <br>
        Email <input type="text" name="email"> <br>
        Foto <input type="file" name="foto">
    @csrf 
    <br>
    <input type="submit" value="Enviar">
    </form>
</body>
</html>