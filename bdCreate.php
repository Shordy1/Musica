<?php


$host = "localhost";
$database = "music_app";
$user = "root";
$password = "";

try {

  //Estable conexion con la base de datos
  $conn = new PDO("mysql:host=$host;", $user, $password);
 
  //Comprueba si existe una base de datos con el nombre music_app
  $stmt = $conn->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'");
  $databaseExists = ($stmt->fetchColumn() > 0);

  if (!$databaseExists) {
    // Ejecutar el archivo setup.sql
    $sql = file_get_contents('sql/bd.sql');
    $conn->exec($sql);
  }

  // Conectarse a la base de datos
  $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);


} catch (PDOException $e) {
  die("PDO Connection Error: " . $e->getMessage());
}
