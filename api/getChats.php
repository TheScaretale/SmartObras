<?php

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);

$usuario = $_SESSION["userId"];

$sql = "SELECT 
    c.id_conversa, 
    c.id_usuario_para, 
    c.id_usuario_de,
    c.mensagem, 
    c.datamensagem,
    u_para.nome AS nome_para,
    u_de.nome AS nome_de,
    u_para.foto AS foto_para,
    u_de.foto AS foto_de,
    CASE
        WHEN TIMESTAMPDIFF(SECOND, c.datamensagem, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(SECOND, c.datamensagem, NOW()), ' segundos atrás')
        WHEN TIMESTAMPDIFF(MINUTE, c.datamensagem, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(MINUTE, c.datamensagem, NOW()), ' minutos atrás')
        WHEN TIMESTAMPDIFF(HOUR, c.datamensagem, NOW()) < 24 THEN CONCAT(TIMESTAMPDIFF(HOUR, c.datamensagem, NOW()), ' horas atrás')
        ELSE CONCAT(TIMESTAMPDIFF(DAY, c.datamensagem, NOW()), ' dias atrás')
    END AS dataUltimaMensagem
FROM 
    conversa c
JOIN 
    usuario u_para ON c.id_usuario_para = u_para.id_usuario
JOIN
    usuario u_de ON c.id_usuario_de = u_de.id_usuario
JOIN (
    SELECT 
        GREATEST(id_usuario_de, id_usuario_para) AS user1,
        LEAST(id_usuario_de, id_usuario_para) AS user2,
        MAX(datamensagem) AS last_message_time
    FROM 
        conversa
    WHERE 
        id_usuario_de = :id OR id_usuario_para = :id
    GROUP BY 
        user1, user2
) last_messages 
ON 
    (GREATEST(c.id_usuario_de, c.id_usuario_para) = last_messages.user1 AND 
     LEAST(c.id_usuario_de, c.id_usuario_para) = last_messages.user2 AND 
     c.datamensagem = last_messages.last_message_time)
LEFT JOIN 
    servico s ON s.id_servicoProposta = c.id_usuario_para
LEFT JOIN 
    servico_proposta sp ON sp.id = s.id_servicoProposta
ORDER BY 
    c.datamensagem DESC;";

$consulta = $banco->prepare($sql);
$consulta->bindParam(':id', $usuario);
$consulta->execute();
$result = $consulta->fetchAll(PDO::FETCH_ASSOC);
if ($consulta->rowCount() > 0) {
    echo json_encode($result);
} else {
    echo json_encode(array('codigo' => 2, 'mensagem' => 'Nenhuma mensagem encontrada'));
}
