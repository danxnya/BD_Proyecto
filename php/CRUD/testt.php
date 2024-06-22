<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Application</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/BD_Proyecto/css/login.css">

</head>
<body>
    <div class="container mt-3">
        <h1>Lista de Usuarios</h1>
        <div class="mb-3">
            <a href="create.php" class="btn btn-success">Agregar Usuario</a>
            <a href="delete.php" class="btn btn-danger">Borrar Usuario</a>
            <a href="update.php" class="btn btn-primary">Actualizar Usuario</a>
        </div>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Materno</th>
                    <th>Apellido Paterno</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos PostgreSQL
                $config = include("config.php");
                $dsn = "pgsql:host=" . $config['db_host'] . ";port=5432;dbname=" . $config['db_name'] . ";user=" . $config['db_user'] . ";password=" . $config['db_password'];

                try {
                    $conn = new PDO($dsn);
                } catch (PDOException $e) {
                    echo "<div class='alert alert-danger' role='alert'>" . $e->getMessage() . "</div>";
                }

                $sql = "SELECT * FROM persona";
                foreach ($conn->query($sql) as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_persona']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['apellido_materno']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['apellido_paterno']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['direccion']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['contrasena']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
