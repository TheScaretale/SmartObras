<?php

include "conn.php";

$dados = json_decode(file_get_contents('php://input'), true);

if (isset($dados["editarPerfil"])) {
    $usuario = $_SESSION["userId"];
    $nome = $dados["nome"];
    $email = $dados["email"];
    $telefone = $dados["telefone"];
    $sobre = $dados["sobreMim"];

    if (isset($dados["foto"])) {
        $foto = $dados["foto"];
        $sql = "UPDATE usuario SET nome = :nome, email = :email, telefone = :telefone, foto = :foto, curriculo = :sobre WHERE id_usuario = :id";
    } else {
        $sql = "UPDATE usuario SET nome = :nome, email = :email, telefone = :telefone, curriculo = :sobre WHERE id_usuario = :id";
    }

    $consulta = $banco->prepare($sql);
    $consulta->bindParam(':nome', $nome);
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':telefone', $telefone);
    $consulta->bindParam(':id', $usuario);
    $consulta->bindParam(':sobre', $sobre);

    if (isset($dados["foto"])) {
        $consulta->bindParam(':foto', $foto);
    }

    $consulta->execute();
    
    if($consulta->rowCount() > 0){  
        echo json_encode(array('codigo' => 1, 'mensagem' => 'Perfil editado com sucesso'));
    }else{
        echo json_encode(array('codigo' => 2, 'mensagem' => 'Erro ao editar perfil'));
    }
} else{
    echo json_encode(array('codigo' => 3, 'mensagem' => 'Erro ao editar perfil'));
}
