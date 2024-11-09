<?php
include "conn.php";

$usuario = $_SESSION["userId"];
$sql = "SELECT * FROM usuario WHERE id_usuario = :id";
$consulta = $banco->prepare($sql);
$consulta->bindParam(':id', $usuario);
$consulta->execute();

$resultado = $consulta->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultado);

