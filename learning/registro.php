<?php 

$errores = "";
$enviado = "";



$nombre = $_POST['nombre'];

$usuario = $_POST['usuario'];
$usuario = strtolower($usuario);

$pass = $_POST['pass'];

if (!empty($nombre)) {
    $nombre = strtoupper($nombre);
}else {
    $errores .= "Falta ingresar el nombre </br>";
}

if (!empty($usuario)) {
    $usuario = strtoupper($usuario);
}else {
    $errores .= "Falta ingresar el usuario </br>";
}

if (!empty($pass)) {
    $pass = strtoupper($pass);
}else {
    $errores .= "Falta ingresar el pass </br>";
}

if (empty($nombre) or empty($usuario) or empty($pass)) {
    $errores .= "Hay campos sin diligenciar";
}else {
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=learning', 'root', 'root');
    }
    catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
}

if (empty($errores)) {
    $statement = $conexion->prepare("INSERT INTO usuarios (id, nombre, usuario, pass ) VALUES (null, '$nombre', '$usuario', '$pass')");
    $statement->execute();

    header("location: index.html");
    $enviado .= "Usuario creado correctamente";

    echo $enviado;


}


?>