<?php 

require "bdCreate.php";

$id_producto = $_GET["id_producto"];

$statement = $conn->prepare("SELECT * FROM producto WHERE id_producto= :id_producto");
$statement->execute([":id_producto" => $id_producto]);

if($statement->rowCount() == 0){
    http_response_code(404);
    echo("HTTP 404 NOT FOUND");
    return;
}

$conn->prepare("DELETE FROM producto WHERE id_producto= :id_producto")->execute([":id_producto" => $id_producto]);
header("Location: tienda.php");

?>
