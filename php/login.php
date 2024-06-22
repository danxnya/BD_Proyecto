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
        echo "Conectado a la base de datos $dbname con éxito!<br>";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Aquí deberías tener una consulta SQL para verificar el correo y la contraseña
    // Por ejemplo, una consulta que busque en una tabla de usuarios
    // Asegúrate de que tu tabla y columnas existan y coincidan con estos nombres
    $sql = "SELECT * FROM persona WHERE correo = :correo AND contrasena = :contrasena";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':contrasena', $contrasena);

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si se encontró el usuario
    if ($stmt->rowCount() == 1) {
        // Usuario encontrado, puedes redirigir o iniciar sesión
        header("Location: /BD_Proyecto/ER.html");
        exit;
    } elseif ($correo == "admin@ipn.mx" && $contrasena == "admin") {
        // Usuario duplicado, manejar el error
        header("Location: /BD_Proyecto/php/CRUD/testt.php");
    }
    
    else {
        // Usuario no encontrado o contraseña incorrecta
        echo "Correo o contraseña incorrectos o ya existe su cuenta.";
    }
}
?>