<?php
// Include the connection and start session
include "conn.php";

// Log the session data for debugging
error_log("Session userId: " . (isset($_SESSION["userId"]) ? $_SESSION["userId"] : 'Not set'));

$dados = json_decode(file_get_contents("php://input"), true);

if (isset($dados["mensagem"])) {
    try {
        if (!isset($_SESSION["userId"])) {
            echo json_encode(['codigo' => 5, 'mensagem' => 'Usuario nao autenticado']);
            exit;
        }
        $usuario = $_SESSION["userId"];
        $destinatario = $dados["idDestinatario"];
        $sql = "";
        $mensagem = $dados["mensagem"];
        $params = [];

        switch ($mensagem) {
            case 'receber':
                $sql = "SELECT c.*, 
                        u1.nome AS nomeRemetente,
                        u2.nome AS nomeDestinatario,
                        u2.foto AS fotoDestinatario
                            FROM usuario u1
                            CROSS JOIN usuario u2
                            LEFT JOIN conversa c ON (
                                (c.id_usuario_de = u1.id_usuario AND c.id_usuario_para = u2.id_usuario)
                                OR 
                                (c.id_usuario_de = u2.id_usuario AND c.id_usuario_para = u1.id_usuario)
                            )
                            WHERE u1.id_usuario = :id 
                            AND u2.id_usuario = :idDestinatario
                            ORDER BY c.datamensagem";
                $params = [
                    ':id' => $usuario,
                    ':idDestinatario' => $destinatario
                ];
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
    } catch (Exception $e) {
        echo json_encode(['codigo' => 3, 'mensagem' => $e->getMessage()]);
    }
} else {
    echo json_encode(['codigo' => 4, 'mensagem' => 'JSON invalido']);
}
