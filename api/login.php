<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

$dados = json_decode(file_get_contents("php://input"));

if (isset($dados["acessar"])) {
    session_start();
    header("Content-Type: application/json; charset=UTF-8");

    include "conexao.php";

    $email = $dados["email"];
    $senha = $dados["password"];

    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    
    $consulta = $banco->prepare($sql);
    $consulta->execute();
    $row = $consulta->rowCount();
    $registro = $consulta->fetch();
    if($row > 0){
        $_SESSION["user"] = $registro["nome"];
        echo json_encode(array('codigo'=>1, 'mensagem'=>'Login efetuado com sucesso!'));
    }else{
        echo json_encode(array('codigo'=>2, 'mensagem'=>'Usuário ou senha inválidos!'));
    }
}
