<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Solicitar ID de Trabajador</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/BD_PROYECTO/css/login.css">
</head>
<body>
    <div class="container mt-3" style="max-width: 600px;">
        <h1 class="mb-4">Solicitar ID de Trabajador para Actualización</h1>
        <form action="updateWorker.php" method="post" class="smb-4">
            <div class="form-group">
                <label for="id_trabajador">ID del Trabajador:</label>
                <input type="text" class="form-control" name="id_trabajador" id="id_trabajador" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar Trabajador</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id_trabajador'];

            // Conexión a la base de datos PostgreSQL
            $config = include("config.php");
            $dsn = "pgsql:host=" . $config['db_host'] . ";port=5432;dbname=" . $config['db_name'] . ";user=" . $config['db_user'] . ";password=" . $config['db_password'];

            try {
                $conn = new PDO($dsn);
                $query = "SELECT * FROM trabajador WHERE id_trabajador = ?";
                $stmt = $conn->prepare($query);
                $stmt->execute([$id]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    echo '<div class="mt-4">';
                    echo '<h2>Trabajador encontrado:</h2>';
                    echo '<form action="updateTRUEWORKER.php" method="post" class="needs-validation" novalidate>';
                    foreach ($user as $key => $value) {
                        echo '<div class="form-group">';
                        echo '<label for="' . htmlspecialchars($key) . '">' . htmlspecialchars(ucfirst(str_replace('_', ' ', $key))) . ':</label>';
                        echo '<input type="text" class="form-control" name="' . htmlspecialchars($key) . '" id="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '" required>';
                        echo '</div>';
                    }
                    echo '<button type="submit" class="btn btn-success">Actualizar Trabajador</button>';
                    echo '</form>';
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-warning" role="alert">Trabajador no encontrado.</div>';
                }
            } catch (PDOException $e) {
                echo '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . '</div>';
            }
        }
        ?>
    </div>
</body>
</html>
