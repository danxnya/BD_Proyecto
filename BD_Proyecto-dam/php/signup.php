<?php
// Conexión a la base de datos PostgreSQL
$config = include("config.php");
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
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $telefono =$_POST['telefono'];
    $contrasena =$_POST['contrasena'];
    $direccion = $_POST['direccion'];

    // Preparar la inserción de datos
    $sql = "INSERT INTO persona (correo, contrasena, nombre, apellido_paterno, apellido_materno, telefono, direccion) VALUES (:correo, :contrasena, :nombre, :apellido_paterno, :apellido_materno, :telefono, :direccion)";

    $stmt = $conn->prepare($sql);

    // Vincular parámetros a la consulta
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido_paterno', $apellido_paterno);
    $stmt->bindParam(':apellido_materno', $apellido_materno);
    $stmt->bindParam(':telefono', $telefono); // Vincular como entero
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->bindParam(':direccion', $direccion);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>
