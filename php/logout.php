<?php
session_start();  // Reanudar la sesión existente
session_unset();  // Liberar todas las variables de sesión
session_destroy();  // Destruir la sesión

header('Location: /BD_Proyecto/index.html');  // Redirigir al usuario a la página de inicio de sesión
exit();
?>
