<?php

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados["getId"])){
    $id = $dados["getId"];
    $sql = "SELECT s.*, COUNT(sp.id) AS totalPropostas
                FROM servico s
                LEFT JOIN servico_proposta sp ON s.id_servico = sp.id_servico
                WHERE s.id_servico = :id
                GROUP BY s.id_servico;";
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