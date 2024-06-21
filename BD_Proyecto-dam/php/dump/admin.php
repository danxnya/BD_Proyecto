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


  
  // CREAR
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "INSERT INTO users(name, email) VALUES(?, ?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $email]);

    echo "Usuario añadido.";
  }


  // LEER
  $query = "SELECT * FROM users";
  $stmt = $db->query($query);

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['name'] . " " . $row['email'] . "<br/>";
  }


  // ACTUALIZAR
  $id = 1;  // ID del usuario a actualizar
  $newEmail = "update@example.com";

  $query = "UPDATE users SET email = ? WHERE id = ?";
  $stmt = $db->prepare($query);
  $stmt->execute([$newEmail, $id]);

  echo "Usuario actualizado.";



  // ELIMINAR
  $id = 1;  // ID del usuario a eliminar

  $query = "DELETE FROM users WHERE id = ?";
  $stmt = $db->prepare($query);
  $stmt->execute([$id]);

  echo "Usuario eliminado.";


  $stmt = $conn->prepare($sql);


  // Ejecutar la consulta
  if ($stmt->execute()) {
    echo "Usuario registrado con éxito.";
  } else {
    echo "Error al registrar el usuario.";
  }
}
