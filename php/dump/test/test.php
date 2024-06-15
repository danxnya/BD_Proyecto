<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Connection</title>
</head>
<body>
    <?php
       require_once('conexion.php'); // Asegúrate de que la ruta al archivo 'conexion.php' es correcta
       Conexion::consultaTest();
    ?>
</body>
</html>


