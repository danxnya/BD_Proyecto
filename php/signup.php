<?php
// Conexión a la base de datos PostgreSQL
$host = "localhost"; // o IP del servidor de bases de datos
$dbname = "gym";
$user = "postgres";
$password = "sexo";
$port = "5432";

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
    // $password = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $telefono =$_POST['telefono'];

    // Preparar la inserción de datos
    $sql = "INSERT INTO persona (correo, nombre, apellido_paterno, apellido_materno, telefono) VALUES (:correo, :nombre, :apellido_paterno, :apellido_materno, :telefono)";

    $stmt = $conn->prepare($sql);

    // Vincular parámetros a la consulta
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido_paterno', $apellido_paterno);
    $stmt->bindParam(':apellido_materno', $apellido_materno);
    $stmt->bindParam(':telefono', $telefono); // Vincular como entero

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>
