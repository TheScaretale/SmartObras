<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

include "conn.php";

$sql = "SELECT * FROM servico;";

$consulta = $banco->prepare($sql);
$consulta->execute();

$servicos = array();

while($registro = $consulta->fetch()){
    $servicos[] = array(
        "id_servico" => $registro["id_servico"],
        "titulo" => $registro["titulo"],
        "descricao" => $registro["descricao"],
        "orcamento" => $registro["orcamento"],
        "id_tipo_servico" => $registro["id_tipo_servico"],
        "id_usuario" => $registro["id_usuario"],
        "id_status" => $registro["id_status"],
        "data_inclusao" => $registro["data_inclusao"],
        "data_validade" => $registro["data_validade"],
        "data_conclusao" => $registro["data_conclusao"]
    );
}



echo json_encode($servicos);