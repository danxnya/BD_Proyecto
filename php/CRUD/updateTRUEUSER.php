<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_usuario'];
    $id_persona = $_POST['id_persona'];
    $id_suscripcion = $_POST['id_suscripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];


    $config = include("config.php");
    $dsn = "pgsql:host=" . $config['db_host'] . ";port=5432;dbname=" . $config['db_name'] . ";user=" . $config['db_user'] . ";password=" . $config['db_password'];

    try {
        $conn = new PDO($dsn);
        $query = "UPDATE usuario SET id_persona = ?, id_suscripcion = ?, fecha_inicio = ?, fecha_fin = ? WHERE id_usuario = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id_persona, $id_suscripcion, $fecha_inicio, $fecha_fin, $id]);
        echo "Persona actualizado con éxito.";
        header("Location: /BD_Proyecto/php/CRUD/testt.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
