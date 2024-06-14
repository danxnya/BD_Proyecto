<?php

class Conexion {
    public static function ConexionBD()
    {
        $host = "localhost";
        $dbname = "gym";
        $username = "postgres";
        $password = "sexo";

        try {
            $conn = new PDO("pgsql:host=$host;dbname=$dbname;user=$username;password=$password");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa<br/>";
            return $conn;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    public static function consultaTest() {
        $conn = self::ConexionBD();
        $sql = 'SELECT * FROM persona';  // Reemplaza 'tu_tabla' con el nombre de tu tabla
        try {
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo $row['correo'] . "<br/>";  // Reemplaza 'tu_columna' con el nombre de tu columna
            }
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
        }
    }
}

?>
