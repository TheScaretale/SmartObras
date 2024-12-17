<?php

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);

if($dados["aceitar"]){
    $sql = "UPDATE servico SET id_servicoProposta = :id_servicoProposta WHERE id_servico = :id_servico;";
    $consulta = $banco->prepare($sql);
    $consulta->bindParam(':id_servicoProposta', $dados["id_servicoProposta"]);
    $consulta->bindParam(':id_servico', $dados["id_servico"]);
    $consulta->execute();

    if($consulta == true){
        echo json_encode(array('codigo'=>1, 'mensagem'=>'Proposta aceita com sucesso!'));
    }else{
        echo json_encode(array('codigo'=>2, 'mensagem'=>'Erro ao aceitar proposta!'));
    }
}else{
    echo json_encode(array('codigo'=>3, 'mensagem'=>'Erro desconhecido'));
}