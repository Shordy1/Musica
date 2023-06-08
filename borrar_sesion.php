<?php
session_start();

// Borrar la variable de sesión específica
unset($_SESSION["id_usuario"]);

// Destruir la sesión
session_destroy();
?>
