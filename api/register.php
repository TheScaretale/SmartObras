<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");


$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados["cadastrar"])){
    include "conn.php";

    $nome = $dados["nome"];
    $email = $dados["email"];
    $senha = $dados["senha"];
    $telefone = $dados["telefone"];
    $tipo = $dados["tipo"];

    //preparando SQL

    $sql = "INSERT INTO usuario (nome, email, senha, telefone, tipo) VALUES (:nome, :email, :senha, :telefone, :tipo)";
    $consulta = $banco->prepare($sql);
    $consulta->bindParam(':nome', $nome);
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':senha', $senha);
    $consulta->bindParam(':telefone', $telefone);
    $consulta->bindParam(':tipo', $tipo);
    $consulta->execute();

    if($consulta == true){
        echo json_encode(array('codigo'=>1, 'mensagem'=>'Usuário cadastrado com sucesso!'));
    }else{
        echo json_encode(array('codigo'=>2, 'mensagem'=>'Erro ao cadastrar usuário!'));
    }
}else{
    echo json_encode(array('codigo'=>3, 'mensagem'=>'Erro desconhecido'));
}