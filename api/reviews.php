<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

include "conn.php";

$sql = "SELECT id_usuario, nome, ifnull(media,0) media, ifnull(quantidade,0) quantidade, 
    ultimo_comentario(id_usuario) comentario  
FROM usuario
LEFT JOIN (SELECT ava_id_usuario, ROUND(AVG(ava_nota),1) media, 
    COUNT(*) quantidade
    FROM avaliacao 
    GROUP BY ava_id_usuario) avaliacoes 
    ON (id_usuario = ava_id_usuario)
ORDER BY nome";
$consulta = $banco->prepare($sql);
$consulta->execute();

$usuarios = array();
while ($registro = $consulta->fetch()) {
    $usuarios[] = array(
        'id_usuario' => $registro["id_usuario"], 
        'nome' => $registro["nome"], 
        'media' => $registro["media"], 
        'quantidade' => $registro["quantidade"], 
        'comentario' => $registro["comentario"]
    );
}

echo json_encode($usuarios);