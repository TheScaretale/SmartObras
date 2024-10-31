<?php

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados["mensagem"])){
    try{
    /* if (!isset($_SESSION["userId"])) {
        echo json_encode(array('codigo' => 4, 'mensagem' => 'Usuário não autenticado'));
        exit;
    } */
    $usuario = $dados["userId"];
    $sql = "";
    $mensagem = $dados["mensagem"];
    $params = [];

    switch($mensagem){
        case 'receber':
            $sql = "SELECT c.*, u.nome AS nomeRemetente , u2.nome AS nomeDestinatario FROM conversa c
                        JOIN usuario u ON c.id_usuário_de = u.id_usuario
                        JOIN usuario u2 ON c.id_usuario_para = u2.id_usuario
                        WHERE id_usuario_de = :id";
            $params = [':id' => $usuario];
            break;
        case 'enviar':
            $sql = "INSERT INTO conversa(id_usuário_de, id_usuario_para, datamensagem, mensagem) VALUES
                    (:id_usuário_de, :id_usuario_para, NOW(), :mensagem);";
            $params = [
                ':id_usuário_de' => $usuario,
                ':id_usuario_para' => $dados["id_usuario_para"],
                ':mensagem' => $dados["conteudoMsg"]
            ];
            break;
        default:
            echo json_encode(array('codigo'=>2, 'mensagem'=>'Tipo mensagem invalido'));
            exit;
    }
    $consulta = $banco->prepare($sql);
    $consulta->execute($params);
    
    if ($mensagem == 'receber') {
        $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } else {
        echo json_encode(array('codigo'=>1, 'mensagem'=>'Mensagem enviada com sucesso'));
    }
    }catch(Exception $e){
        echo json_encode(array('codigo'=>3, 'mensagem'=>$e->getMessage()));
    }
}else{
    echo json_encode(array('codigo'=>4, 'mensagem'=>'JSON invalido'));
}