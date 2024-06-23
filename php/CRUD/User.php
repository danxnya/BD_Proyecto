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
            <a href="/BD_Proyecto/php/logout.php" class="btn btn-warning list" style="background-color:pink; border-color:pink; color: black;">Cerrar Sesión</a>
            <a href="createUser.php" class="btn btn-success">Agregar Usuario</a>
            <a href="deleteUser.php" class="btn btn-danger">Borrar Usuario</a>
            <a href="updateUser.php" class="btn btn-primary">Actualizar Usuario</a> 

            <a href="/BD_Proyecto/php/CRUD/testt.php" class="btn btn-primary">CRUD para Personas</a>
            <a href="/BD_Proyecto/php/CRUD/User.php" class="btn btn-primary">CRUD para Usuarios</a>
            <a href="/BD_Proyecto/php/CRUD/Worker.php" class="btn btn-primary">CRUD para Trabajadores</a>
        </div>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID Usuario</th>
                    <th>ID persona</th>
                    <th>Suscripcion</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Reanudar la sesión existente de administrador
                session_start();
                if (!isset($_SESSION['admin'])) {
                    header("Location: /BD_Proyecto/php/login.php");
                    exit;
                }

                // Conexión a la base de datos PostgreSQL
                $config = include("config.php");
                $dsn = "pgsql:host=" . $config['db_host'] . ";port=5432;dbname=" . $config['db_name'] . ";user=" . $config['db_user'] . ";password=" . $config['db_password'];

                try {
                    $conn = new PDO($dsn);
                } catch (PDOException $e) {
                    echo "<div class='alert alert-danger' role='alert'>" . $e->getMessage() . "</div>";
                }

                $sql = "SELECT * FROM usuario";
                foreach ($conn->query($sql) as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_usuario']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['id_persona']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['id_suscripcion']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['fecha_inicio']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['fecha_fin']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
