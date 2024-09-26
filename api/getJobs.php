<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

include "conn.php";


$dados = json_decode(file_get_contents("php://input"), true);
if (isset($dados["filtrar"])) {
    $sql = "SELECT * FROM servico WHERE 1=1";

    $tipos = "";
    $ctrl = "";
    if (isset($dados["azulejista"]) && $dados["azulejista"] == 1) {
        $tipos .= $ctrl . "1";
        $ctrl = ",";
    }
    if (isset($dados["eletricista"]) && $dados["eletricista"] == 2) {
        $tipos .= $ctrl . "2";
        $ctrl = ",";
    }
    if (isset($dados["hidraulica"]) && $dados["hidraulica"] == 3) {
        $tipos .= $ctrl . "3";
        $ctrl = ",";
    }
    if ($tipos <> "") {
        $sql .= " AND id_tipo_servico IN ($tipos)";
    }

    $consulta = $banco->prepare($sql);
    $consulta->execute();

    $servicos = array();


    while ($registro = $consulta->fetch()) {
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


    header('Content-Type: application/json');
    echo json_encode($servicos);
}else{
    echo json_encode(array('codigo'=>2, 'mensagem'=>'Erro desconhecido'));
}
