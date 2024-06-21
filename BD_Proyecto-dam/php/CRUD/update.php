<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Solicitar ID de Usuario</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/BD_PROYECTO/css/mystyle.css">
</head>
<body>
    <div class="container mt-3" style="max-width: 600px;">
        <h1 class="mb-4">Solicitar ID de Usuario para Actualización</h1>
        <form action="update.php" method="post" class="mb-4">
            <div class="form-group">
                <label for="id_persona">ID del Usuario:</label>
                <input type="text" class="form-control" name="id_persona" id="id_persona" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar Usuario</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id_persona'];

            // Conexión a la base de datos PostgreSQL
            $config = include("config.php");
            $dsn = "pgsql:host=" . $config['db_host'] . ";port=5432;dbname=" . $config['db_name'] . ";user=" . $config['db_user'] . ";password=" . $config['db_password'];

            try {
                $conn = new PDO($dsn);
                $query = "SELECT * FROM persona WHERE id_persona = ?";
                $stmt = $conn->prepare($query);
                $stmt->execute([$id]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    echo '<div class="mt-4">';
                    echo '<h2>Usuario encontrado:</h2>';
                    echo '<form action="updateTRUE.php" method="post" class="needs-validation" novalidate>';
                    foreach ($user as $key => $value) {
                        echo '<div class="form-group">';
                        echo '<label for="' . htmlspecialchars($key) . '">' . htmlspecialchars(ucfirst(str_replace('_', ' ', $key))) . ':</label>';
                        echo '<input type="text" class="form-control" name="' . htmlspecialchars($key) . '" id="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '" required>';
                        echo '</div>';
                    }
                    echo '<button type="submit" class="btn btn-success">Actualizar Usuario</button>';
                    echo '</form>';
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-warning" role="alert">Usuario no encontrado.</div>';
                }
            } catch (PDOException $e) {
                echo '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . '</div>';
            }
        }
        ?>
    </div>
</body>
</html>
