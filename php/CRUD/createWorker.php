<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar trabajador</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/BD_Proyecto/css/login.css">
</head>
<body>
    <div class="container mt-3" style="max-width: 600px;"> <!-- Reducir el ancho máximo aquí -->
        <h1 class="mb-3">Agregar Nuevo trabajador</h1>
        <form action="createUser.php" method="post" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="trabajador">ID Trabajador:</label>
                <input type="text" class="form-control form-control-sm" name="trabajador" id="trabajador" required> <!-- Smaller input field -->
                <div class="invalid-feedback">Este campo es obligatorio.</div>
            </div>
            <div class="form-group">
                <label for="persona">ID Persona:</label>
                <input type="text" class="form-control form-control-sm" name="persona" id="persona" required>
                <div class="invalid-feedback">Este campo es obligatorio.</div>
            </div>
            <!-- Para el area de trabajo -->
            <div class="form-group">
                <label for="area">Area de trabajo:</label>
                <input type="text" class="form-control form-control-sm" name="area" id="area" required>
                <div class="invalid-feedback">Este campo es obligatorio.</div>
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
        

        $id_trabajador = $_POST['id_trabajador'];
        $id_persona = $_POST['id_persona'];
        $area = $_POST['area'];

        // Insertar trabajador en la base de datos
        $query = "INSERT INTO trabajador(id_trabajador, id_persona, area) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id_trabajador, $id_persona, $area]);
        
        echo "Usuario añadido con éxito.";
    }
?>
