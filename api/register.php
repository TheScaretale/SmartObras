<?php
/**
 * Este script PHP registra um novo usuário no banco de dados.
 * 
 * Cabeçalhos HTTP configurados:
 * - Access-Control-Allow-Origin: *
 * - Access-Control-Allow-Headers: Content-Type, Authorization
 * - Access-Control-Allow-Methods: POST, GET, OPTIONS
 * - Access-Control-Allow-Credentials: true
 * - Content-Type: application/json; charset=UTF-8
 * 
 * O script espera receber um JSON via método POST contendo os seguintes campos:
 * - cadastrar: booleano para indicar a intenção de cadastro
 * - nome: string com o nome do usuário
 * - email: string com o email do usuário
 * - senha: string com a senha do usuário
 * - telefone: string com o telefone do usuário
 * - tipo: string com o tipo de usuário
 * 
 * O script realiza as seguintes ações:
 * 1. Decodifica o JSON recebido.
 * 2. Verifica se o campo "cadastrar" está presente e é verdadeiro.
 * 3. Inclui o arquivo de conexão com o banco de dados (conn.php).
 * 4. Prepara e executa uma consulta SQL para inserir os dados do usuário na tabela "usuario".
 * 5. Retorna uma resposta JSON indicando o sucesso ou falha do cadastro.
 * 
 * Possíveis respostas JSON:
 * - Sucesso: {"codigo":1, "mensagem":"Usuário cadastrado com sucesso!"}
 * - Falha: {"codigo":2, "mensagem":"Erro ao cadastrar usuário!"}
 * - Erro desconhecido: {"codigo":3, "mensagem":"Erro desconhecido"}
 */


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