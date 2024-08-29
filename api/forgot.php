<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados["recuperar"])){
    include "conn.php";

    $email = $dados["email"];

    $sql = "SELECT * FROM usuario WHERE email = ?";
    $consulta = $banco->prepare($sql);
    $consulta->execute(array($email));
    $registro = $consulta->fetch();
    if($registro){
        echo json_encode(array('codigo'=>1, 'mensagem'=>'Email enviado com sucesso!'));
    }else{
        echo json_encode(array('codigo'=>2, 'mensagem'=>'Email não encontrado!'));
    }
}else{
    echo json_encode(array('codigo'=>3, 'mensagem'=>'Erro desconhecido'));
}