<?php 

$errores = "";
$enviado = "";




$usuario = $_POST['usuario'];

$pass = $_POST['pass'];


if (!empty($usuario)) {
    $usuario = $usuario;
}else {
    $errores .= "Falta ingresar el usuario </br>";
}

if (!empty($pass)) {
    $pass = $pass;
}else {
    $errores .= "Falta ingresar el pass </br>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=learning', 'root', 'root');
    }
    catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }

    $statement = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = $usuario AND pass = $pass");
    $statement->execute();

    $resultado = $statement->fetch();

    if ($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        header('location: contenido.php');
    }else {
        $errores = "Datos incorrectos";
        echo $errores;
    }
}




?>