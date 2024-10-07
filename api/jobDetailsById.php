<?php

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados["getId"])){
    $id = $dados["getId"];
    $sql = "SELECT * FROM servico WHERE id_servico = :id";
    $consulta = $banco->prepare($sql);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $servico = $consulta->fetch(PDO::FETCH_ASSOC);
    if($servico == false){
        echo json_encode(array('codigo'=>2, 'mensagem'=>'Serviço não encontrado'));
        exit;
    }else{
        echo json_encode($servico);
    }
}else{
    echo json_encode(array('codigo'=>3, 'mensagem'=>'Erro desconhecido'));
}