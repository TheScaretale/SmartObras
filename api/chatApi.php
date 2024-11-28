<?php
// Include the connection and start session
include "conn.php";

// Log the session data for debugging
error_log("Session userId: " . (isset($_SESSION["userId"]) ? $_SESSION["userId"] : 'Not set'));

$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados["mensagem"])){
    try{
        if(!isset($_SESSION["userId"])){
            echo json_encode(['codigo' => 5, 'mensagem' => 'Usuario nao autenticado']);
            exit;
        }
        $usuario = $_SESSION["userId"];
        $destinatario = $dados["idDestinatario"];
        $sql = "";
        $mensagem = $dados["mensagem"];
        $params = [];

        switch($mensagem){
            case 'receber':
                $sql = "SELECT c.*, u.nome AS nomeRemetente, u2.nome AS nomeDestinatario, u3.foto as fotoDestinatario
                        FROM conversa c
                        JOIN usuario u ON c.id_usuario_de = u.id_usuario
                        JOIN usuario u2 ON c.id_usuario_para = u2.id_usuario
                        JOIN usuario u3 on c.id_usuario_para = u3.id_usuario
                        WHERE (id_usuario_de = :id AND id_usuario_para = :idDestinatario)
                           OR (id_usuario_de = :idDestinatario AND id_usuario_para = :id)
                        ORDER BY c.datamensagem";
                $params = [':id' => $usuario,
                           ':idDestinatario' => $destinatario];
                break;
            case 'enviar':
                $sql = "INSERT INTO conversa(id_usuario_de, id_usuario_para, datamensagem, mensagem) VALUES
                        (:id_usuario_de, :id_usuario_para, NOW(), :mensagem);";
                $params = [
                    ':id_usuario_de' => $usuario,
                    ':id_usuario_para' => $destinatario,
                    ':mensagem' => $dados["conteudoMsg"]
                ];
                break;
            default:
                echo json_encode(['codigo' => 2, 'mensagem' => 'Tipo mensagem invalido']);
                exit;
        }
        $consulta = $banco->prepare($sql);
        $consulta->execute($params);
        
        if ($mensagem == 'receber') {
            $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } else {
            echo json_encode(['codigo' => 1, 'mensagem' => 'Mensagem enviada com sucesso']);
        }
        
    } catch(Exception $e){
        echo json_encode(['codigo' => 3, 'mensagem' => $e->getMessage()]);
    }
} else {
    echo json_encode(['codigo' => 4, 'mensagem' => 'JSON invalido']);
}