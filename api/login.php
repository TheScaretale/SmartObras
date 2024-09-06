<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// Decode the JSON input
$dados = json_decode(file_get_contents("php://input"), true);

// Check if 'acessar' field is set
if (isset($dados["acessar"])) {
    session_start();
    include "conn.php";

    
    $email = $dados["email"];
    $senha = $dados["senha"];
    
    // Prepare and execute the SQL query
    $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
    $consulta = $banco->prepare($sql);
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':senha', $senha);
    $consulta->execute();
    $registro = $consulta->fetch();

    if ($registro) {
        $_SESSION["user"] = $registro["nome"];
        echo json_encode(array('codigo' => 1, 'mensagem' => 'Login efetuado com sucesso!'));
    } else {
        echo json_encode(array('codigo' => 2, 'mensagem' => 'Usuário ou senha inválidos!'));
    }
} else {
    echo json_encode(array('codigo' => 3, 'mensagem' => 'Erro desconhecido'));
}