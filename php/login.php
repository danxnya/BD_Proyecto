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
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establecer el modo de error para excepciones
    if ($conn) {
        echo "Conectado a la base de datos $dbname con éxito!<br>";
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}

// Iniciar una nueva sesión
session_start();

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para verificar el correo y la contraseña
    $sql = "SELECT * FROM persona WHERE correo = :correo AND contrasena = :contrasena";

    try {
        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Vincular parámetros
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena);

        // Ejecutar la consulta
        $stmt->execute();

        // Verificar si se encontró el usuario
        if ($stmt->rowCount() == 1) {
            // Obtener datos del usuario
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si es administrador (por ejemplo, comparando con un correo específico y contraseña)
            if ($correo == "admin@ipn.mx" && $contrasena == "admin") {
                // Usuario administrador
                $_SESSION['admin'] = 'admin';
                echo "Inicio de sesión exitoso como administrador.";
                header("Location: /BD_Proyecto/php/CRUD/testt.php");
                exit;
            } else {
                // Usuario normal
                $_SESSION['correo'] = $correo; // Guardar el correo en la sesión si es necesario
                header("Location: /BD_Proyecto/ER.html");
                exit;
            }
        } elseif ($stmt->rowCount() == 0){
            // Usuario no encontrado o contraseña incorrecta
            echo "Correo o contraseña incorrectos.";
        } else {
            // Más de un usuario encontrado
            echo "Error: Se encontraron múltiples usuarios con el mismo correo y contraseña.";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}
?>
