<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);

if (isset($dados["getId"])) {
    $id = $dados["getId"];
    $sql = "SELECT 
    s.*, 
    sp.mensagem, 
    sub.totalPropostas, 
    u1.nome as nomeUsuario, 
    u2.nome as nomeCriador,
    sp.id as id_proposta,
    s.id_servicoProposta as propostaAceita,
    u3.nome as nomeUsuarioPropostaAceita,
    sp_aceita.id_usuario as idTrabalhador,
    CASE 
        WHEN s.id_servicoProposta IS NULL THEN 3
        WHEN s.id_servicoProposta = '' THEN 2
        ELSE 1
    END AS status
FROM 
    servico s
LEFT JOIN 
    servico_proposta sp ON s.id_servico = sp.id_servico
LEFT JOIN 
    usuario u1 ON sp.id_usuario = u1.id_usuario
LEFT JOIN 
    usuario u2 ON s.id_usuario = u2.id_usuario
LEFT JOIN (
    SELECT 
        id_servico, 
        COUNT(id) AS totalPropostas
    FROM 
        servico_proposta
    GROUP BY 
        id_servico
) sub ON s.id_servico = sub.id_servico
LEFT JOIN 
    servico_proposta sp_aceita ON sp_aceita.id = s.id_servicoProposta
LEFT JOIN 
    usuario u3 ON sp_aceita.id_usuario = u3.id_usuario
WHERE 
    s.id_servico = :id";
    $consulta = $banco->prepare($sql);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $result = $consulta->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        echo json_encode(array('codigo' => 2, 'mensagem' => 'Serviço não encontrado'));
        exit;
    } else {
        $servico = $result[0];
        $servico['propostas'] = array();

        foreach ($result as $row) {
            if (!empty($row['mensagem'])) {
                $servico['propostas'][] = array(
                    'mensagem' => $row['mensagem'], 
                    'nomeUsuario' => $row['nomeUsuario'],
                    'id_proposta' => $row['id_proposta']);
            }
        }

        echo json_encode($servico);
    }
} else {
    echo json_encode(array('codigo' => 3, 'mensagem' => 'Erro desconhecido'));
}
