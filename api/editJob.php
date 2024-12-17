<?php

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);
if (isset($dados["editar"])) {
    try {
        $sql = "UPDATE servico SET titulo = :titulo, descricao = :descricao, orcamento = :orcamento WHERE id_servico = :id_servico;";
        $consulta = $banco->prepare($sql);
        $consulta->bindParam(':titulo', $dados["titulo"]);
        $consulta->bindParam(':descricao', $dados["descricao"]);
        $consulta->bindParam(':orcamento', $dados["orcamento"]);
        $consulta->bindParam(':id_servico', $dados["id_servico"]);
        $consulta->execute();

        if ($consulta == true) {
            echo json_encode(array('codigo' => 1, 'mensagem' => 'Trabalho editado com sucesso!'));
        } else {
            echo json_encode(array('codigo' => 2, 'mensagem' => 'Erro ao editar trabalho!'));
        }
    } catch (Exception $e) {
        echo json_encode(array('codigo' => 3, 'mensagem' => $e->getMessage()));
    }
}
