<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ingresar</title>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/BD_Proyecto/css/login.css" />
  <link rel="icon" href="/WB_Proyecto/img/PIT.png" type="image/icon type">


  <style>
    /* Estilos adicionales para mejorar el centrado y la presentación */

    .container-height {
      height: 100%;
      align-items: center; /* Alineación vertical */
      justify-content: center; /* Alineación horizontal */
    }
    fieldset {
      width: 100%; /* Opcional: ajusta el ancho del fieldset si es necesario */
    }
  </style>
</head>

<body>
  <!-- Barra de navegación-->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <!-- Icono del lado izquierdo -->
      <img class="logo" src="/BD_Proyecto/img/logo.png" alt="Logo Pagina" title="Mio" height="70px">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/BD_Proyecto/index.html"><i class="bi bi-house-door-fill"></i> Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/BD_Proyecto/login.html"><i class="bi bi-person-fill"></i> Ingresar</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/BD_Proyecto/creditos.html"><i class="bi bi-mortarboard-fill"></i>
              Creditos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/BD_Proyecto/ER.html"><i class="bi bi-person-plus-fill"></i> Entidad Relación</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/BD_Proyecto/contacto.html"><i class="bi bi-telephone-fill"></i> Contacto</a>
            </li>
        </ul>
        <img src="/BD_Proyecto/img/logo-ipn.png" alt="Logo Pagina" title="ESCOM_Nombre" height="60px">
      </div>
    </div>
  </nav>

  <div class="body container-fluid container-height">
    <div class="row justify-content-center">
    <div class="col-lg-4">
        <fieldset class="shadow mb-5">
          <legend>Registro</legend>
          <form action="/BD_Proyecto/php/login1.php" method="POST" id="loginForm">

            <div class="formulario_campo form-group" id="formulario_correo">
                <label for="correo" class="form-label">Correo:</label>
                <i class="formulario__validacion bi bi-x-circle-fill"></i>
                <input type="email" class="form-control" name="correo" id="correo" placeholder="name@mail.com"required />
            </div>
            <div class="formulario_campo form-group" id="formulario_contrasena">
              <label for="contrasena" class="form-label">Contraseña: </label>
              <i class="formulario__validacion bi bi-x-circle-fill"></i>
              <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Pon al menos un caracter especial"required />
          </div>
            <div class="formulario_campo form-group" id="formulario_nombre">
              <label for="nombre">Nombre:</label>
              <i class="formulario__validacion bi bi-x-circle-fill"></i>
              <input type="text" class="form-control" name="nombre" id="nombre" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_apellido_paterno">
              <label for="apellido_paterno">Primer apellido:</label>
              <i class="formulario__validacion bi bi-x-circle-fill"></i>
              <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_apellido_materno">
              <label for="apellido_materno">Segundo apellido:</label>
              <i class="formulario__validacion bi bi-x-circle-fill"></i>
              <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_telefono">
              <label for="telefono">Telefono:</label>
              <i class="formulario__validacion bi bi-x-circle-fill"></i>
              <input type="number" class="form-control" name="telefono" id="telefono" required />

            </div>
            <div class="formulario_campo form-group" id="formulario_direccion">
              <label for="direccion" class="form-label">Direccion: </label>
              <i class="formulario__validacion bi bi-x-circle-fill"></i>
              <input type="direccion" class="form-control" name="direccion" id="direccion" placeholder="Municipio, calle, cp"required />
          </div>
          
            <input type="submit" class="btn btn-primary" value="Enviar" />
            <input type="reset" class="btn btn-secondary" value="Limpiar" />

            <div class="formulario__mensaje" id="formulario__mensaje">
              <p>Por favor rellena el formulario correctamente. </p>
            </div>

            <div class="formulario__grupo formulario__grupo-btn-enviar">
              <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
          </form>
        </fieldset>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="resultModalLabel">Resultados</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body data">

              
                <div class="container">
                  <h1 class="display-4">Datos personales</h1>
                  <p class="lead">
                    En esta sección se mostrarán los datos personales y académicos que
                    se han registrado.
                  </p>
                </div>
                <div class="php">

                <?php
                $mostrarModal = false;

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
        $mostrarModal = true;
    
        echo "Usuario registrado con éxito.<br>";
        echo "Correo: $correo<br>";
        echo "Nombre: $nombre<br>";
        echo "Apellido Paterno: $apellido_paterno<br>";
        echo "Apellido Materno: $apellido_materno<br>";
        echo "Telefono: $telefono<br>";
        echo "Direccion: $direccion<br>";

    } else {
        echo "Error al registrar el usuario.";
    }
}
?>

                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <footer class="footer mt-auto py-3">
    <div class="container text-center">
      <span class="text-muted">© 2024 Mi Sitio Web</span>
    </div>
  </footer>




  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/BD_Proyecto/js/login.js"></script>


  <?php if ($mostrarModal) : ?>
    <script>
      var myModal = new bootstrap.Modal(document.getElementById('resultModal'));
      myModal.show();
    </script>
  <?php endif; ?>


</body>

</html>