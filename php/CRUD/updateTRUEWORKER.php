<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_trabajador'];
    $id_persona = $_POST['id_persona'];
    $area = $_POST['area'];


    $config = include("config.php");
    $dsn = "pgsql:host=" . $config['db_host'] . ";port=5432;dbname=" . $config['db_name'] . ";user=" . $config['db_user'] . ";password=" . $config['db_password'];

    try {
        $conn = new PDO($dsn);
        $query = "UPDATE trabajador SET id_persona = ?, area = ? WHERE id_trabajador = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id_persona, $area, $id]);
        echo "Trabajador actualizado con éxito.";
        header("Location: /BD_Proyecto/php/CRUD/testt.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
