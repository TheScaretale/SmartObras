<?php

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados["getChats"])){
    $usuario = $dados["userId"];

    $sql = "SELECT 
    c.id_conversa, 
    c.id_usuario_para, 
    c.id_usuario_de,
    c.mensagem, 
    c.datamensagem,
    CASE
        WHEN TIMESTAMPDIFF(SECOND, c.datamensagem, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(SECOND, c.datamensagem, NOW()), ' seconds ago')
        WHEN TIMESTAMPDIFF(MINUTE, c.datamensagem, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(MINUTE, c.datamensagem, NOW()), ' minutes ago')
        WHEN TIMESTAMPDIFF(HOUR, c.datamensagem, NOW()) < 24 THEN CONCAT(TIMESTAMPDIFF(HOUR, c.datamensagem, NOW()), ' hours ago')
        ELSE CONCAT(TIMESTAMPDIFF(DAY, c.datamensagem, NOW()), ' days ago')
    END AS time_since_last_message
    FROM 
        conversa c
    JOIN (
        SELECT 
            GREATEST(id_usuario_de, id_usuario_para) AS user1,
            LEAST(id_usuario_de, id_usuario_para) AS user2,
            MAX(datamensagem) AS last_message_time
        FROM 
            conversa
        WHERE 
            id_usuario_de = 1 OR id_usuario_para = 1
        GROUP BY 
            user1, user2
    ) last_messages 
    ON 
        (GREATEST(c.id_usuario_de, c.id_usuario_para) = last_messages.user1 AND 
         LEAST(c.id_usuario_de, c.id_usuario_para) = last_messages.user2 AND 
         c.datamensagem = last_messages.last_message_time)
    ORDER BY 
        c.datamensagem DESC;";

    $consulta = $banco->prepare($sql);
    $consulta->execute();
    $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
    if($consulta->rowCount() > 0){
        echo json_encode($result);
    }else{
        echo json_encode(array('codigo'=>2, 'mensagem'=>'Nenhuma mensagem encontrada'));
    }
}else{
    echo json_encode(array('codigo'=>3, 'mensagem'=>'Erro ao buscar mensagens'));
}