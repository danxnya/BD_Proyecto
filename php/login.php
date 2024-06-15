<?php
// Conexión a la base de datos PostgreSQL
$config = include("/config.php");
$host = $config['db_host'];
$user = $config['db_user'];
$password = $config['db_password'];
$dbname = $config['db_name'];
$port = 5432;

// String de conexión
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    $conn = new PDO($dsn);
    if ($conn) {
        echo "Conectado a la base de datos $dbname con éxito!";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena =$_POST['contrasena'];

    // Preparar la inserción de datos
    if ($correo == "admin@ipn.mx" && $contrasena == "admin") {
        header("Location: /BD_Proyecto/php/CRUD/testt.php");
    } else {
        header("Location: index.php");
    }

    $stmt = $conn->prepare($sql);


    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>
