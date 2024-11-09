<?php

include "conn.php";

$dados = json_decode(file_get_contents('php://input'), true);

if (isset($dados["editarPerfil"])) {
    $usuario = $_SESSION["userId"];
    $sql = "INSERT INTO usuario (nome, email, senha, telefone, foto) VALUES (:nome, :email, :senha, :telefone, :foto)";
    $consulta = $banco->prepare($sql);
    $consulta->execute($params);

    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    if ($resultado == true) {
        echo json_encode(array('codigo' => 1, $resultado));
    } else {
        echo json_encode(array('codigo' => 2, 'mensagem' => 'Usuário não encontrado'));
    }
}
