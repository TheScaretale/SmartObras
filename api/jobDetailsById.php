<?php

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados["getId"])){
    $id = $dados["getId"];
    $sql = "SELECT s.*, sp.mensagem, sub.totalPropostas, u.nome as nomeUsuario
                FROM servico s
                LEFT JOIN servico_proposta sp ON s.id_servico = sp.id_servico
                LEFT JOIN usuario u ON sp.id_usuario = u.id_usuario
                LEFT JOIN (
                    SELECT id_servico, COUNT(id) AS totalPropostas
                    FROM servico_proposta
                    GROUP BY id_servico
                ) sub ON s.id_servico = sub.id_servico
                WHERE s.id_servico = :id;";
    $consulta = $banco->prepare($sql);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
    if(empty($result)){
        echo json_encode(array('codigo'=>2, 'mensagem'=>'Serviço não encontrado'));
        exit;
    }else{
        $servico = $result[0];
        $servico['mensagens'] = array();
        
        foreach($result as $row){
            if(!empty($row['mensagem'])){
                $servico['mensagens'][] = $row['mensagem'];
            }
        }
        
        echo json_encode($servico);
    }
}else{
    echo json_encode(array('codigo'=>3, 'mensagem'=>'Erro desconhecido'));
}