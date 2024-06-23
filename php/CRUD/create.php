<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/BD_Proyecto/css/login.css">
</head>
<body>
    <div class="container mt-3" style="max-width: 600px;"> <!-- Reducir el ancho máximo aquí -->
        <h1 class="mb-3">Agregar Nuevo Usuario</h1>
        <form action="create.php" method="post" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" required> <!-- Smaller input field -->
                <div class="invalid-feedback">Este campo es obligatorio.</div>
            </div>
            <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" class="form-control form-control-sm" name="apellido_paterno" id="apellido_paterno" required>
                <div class="invalid-feedback">Este campo es obligatorio.</div>
            </div>
            <div class="form-group">
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" class="form-control form-control-sm" name="apellido_materno" id="apellido_materno" required>
                <div class="invalid-feedback">Este campo es obligatorio.</div>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control form-control-sm" name="correo" id="correo" required>
                <div class="invalid-feedback">Proporcione un correo electrónico válido.</div>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control form-control-sm" name="contrasena" id="contrasena" required>
                <div class="invalid-feedback">Este campo es obligatorio.</div>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control form-control-sm" name="telefono" id="telefono" required>
                <div class="invalid-feedback">Este campo es obligatorio.</div>
            </div>
            <div class="formulario_campo form-group" id="formulario_municipio">
              <label for="municipio" class="form-label">Municipio: </label>
              <i class="formulario__validacion bi bi-x-circle-fill"></i>
              <input type="municicpio" class="form-control" name="municipio" id="municipio" placeholder="Benito Juarez"required />
          </div>
          <div class="formulario_campo form-group" id="formulario_calle">
              <label for="calle" class="form-label">Calle: </label>
              <i class="formulario__validacion bi bi-x-circle-fill"></i>
              <input type="calle" class="form-control" name="calle" id="calle" placeholder="Calle los linrios"required />
          </div>
          <div class="formulario_campo form-group" id="formulario_cp">
              <label for="cp" class="form-label">CP: </label>
              <i class="formulario__validacion bi bi-x-circle-fill"></i>
              <input type="cp" class="form-control" name="cp" id="cp" placeholder="00000"required />
          </div>
            <button type="submit" class="btn btn-primary btn-sm">Guardar</button> <!-- Smaller button -->
        </form>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

</body>
</html>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Incluir archivo de conexión a la base de datos
        require_once "config.php";
        $conn = include("verificar.php");
        

        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $municiopio = $_POST['municipio'];
        $calle = $_POST['calle'];
        $cp = $_POST['cp'];
        $contrasena = $_POST['contrasena'];
        $apellido_materno = $_POST['apellido_materno'];
        $apellido_paterno = $_POST['apellido_paterno'];

        $query = "INSERT INTO persona (nombre, correo, telefono, municipio, calle, cp, contrasena, apellido_materno, apellido_paterno) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$nombre, $correo, $telefono, $municiopio, $calle, $cp, $contrasena, $apellido_materno, $apellido_paterno]);

        echo "Usuario añadido con éxito.";
    }
?>
