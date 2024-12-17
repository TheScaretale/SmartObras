<?php

header("Content-Type: application/json; charset=UTF-8");

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados["proposta"])){
    $sql = "INSERT INTO servico_proposta(id_servico, id_usuario, mensagem, data_inclusao, data_validade,orcamento_proposta)
                VALUES(:id_servico, :id_usuario, :mensagem, NOW(), date_add(now(), interval 1 week), :orcamento);";
    $consulta = $banco->prepare($sql);
    $consulta->bindParam(':id_servico', $dados["id_servico"]);
    $consulta->bindParam(':id_usuario', $_SESSION["userId"]);
    $consulta->bindParam(':mensagem', $dados["mensagemProposta"]);
    $consulta->bindParam(':orcamento', $dados["orcamentoProposta"]);
    $consulta->execute();

    if($consulta == true){
        echo json_encode(array('codigo'=>1, 'mensagem'=>'Proposta cadastrada com sucesso!'));
    }else{
        echo json_encode(array('codigo'=>2, 'mensagem'=>'Erro ao cadastrar proposta!'));
    }
}else{
    echo json_encode(array('codigo'=>3, 'mensagem'=>'Erro desconhecido'));
}