<?php
/**
 * Este script lida com solicitações de recuperação de senha.
 * 
 * Cabeçalhos HTTP configurados:
 * - Access-Control-Allow-Origin: *
 * - Access-Control-Allow-Headers: Content-Type, Authorization
 * - Access-Control-Allow-Methods: POST, GET, OPTIONS
 * - Access-Control-Allow-Credentials: true
 * - Content-Type: application/json; charset=UTF-8
 * 
 * O script espera receber um JSON no corpo da requisição com a seguinte estrutura:
 * {
 *     "recuperar": true,
 *     "email": "usuario@example.com"
 * }
 * 
 * Funcionalidade:
 * - Se a chave "recuperar" estiver presente no JSON recebido, o script tenta encontrar o email fornecido no banco de dados.
 * - Se o email for encontrado, retorna um JSON com código 1 e mensagem "Email enviado com sucesso!".
 * - Se o email não for encontrado, retorna um JSON com código 2 e mensagem "Email não encontrado!".
 * - Se a chave "recuperar" não estiver presente, retorna um JSON com código 3 e mensagem "Erro desconhecido".
 * 
 * Dependências:
 * - Conexão com o banco de dados através do arquivo "conn.php".
 */

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Credentials: true");
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