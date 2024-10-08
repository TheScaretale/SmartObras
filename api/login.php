<?php
/**
 * Arquivo: /home/mikael/Documents/TCC/SmartObras/api/login.php
 * 
 * Este script PHP lida com solicitações de login para a aplicação SmartObras.
 * 
 * Funcionalidades:
 * - Permite solicitações de origem cruzada (CORS) com métodos POST, GET e OPTIONS.
 * - Lida com requisições preflight OPTIONS.
 * - Decodifica a entrada JSON recebida.
 * - Verifica se o campo 'acessar' está presente na entrada JSON.
 * - Inicia uma sessão e inclui o arquivo de conexão com o banco de dados.
 * - Prepara e executa uma consulta SQL para verificar as credenciais do usuário.
 * - Se as credenciais forem válidas, inicia a sessão do usuário e retorna uma mensagem de sucesso.
 * - Se as credenciais forem inválidas, retorna uma mensagem de erro.
 * - Se o campo 'acessar' não estiver presente, retorna uma mensagem de erro desconhecido.
 * 
 * Cabeçalhos HTTP:
 * - Access-Control-Allow-Origin: *
 * - Access-Control-Allow-Headers: Content-Type, Authorization
 * - Access-Control-Allow-Methods: POST, GET, OPTIONS
 * - Access-Control-Allow-Credentials: true
 * - Content-Type: application/json; charset=UTF-8
 * 
 * Estrutura de Resposta JSON:
 * - Sucesso: { "codigo": 1, "mensagem": "Login efetuado com sucesso!" }
 * - Erro de credenciais: { "codigo": 2, "mensagem": "Usuário ou senha inválidos!" }
 * - Erro desconhecido: { "codigo": 3, "mensagem": "Erro desconhecido" }
 */

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Handle preflight request
    http_response_code(204);
    exit;
}

// Decode the JSON input
$dados = json_decode(file_get_contents("php://input"), true);

// Check if 'acessar' field is set
if (isset($dados["acessar"])) {
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
        $_SESSION["userType"] = $registro["tipo"];
        $_SESSION["userId"] = $registro["id_usuario"];
        echo json_encode(array('codigo' => 1, 'mensagem' => 'Login efetuado com sucesso!'));
    } else {
        echo json_encode(array('codigo' => 2, 'mensagem' => 'Usuário ou senha inválidos!'));
    }
} else {
    echo json_encode(array('codigo' => 3, 'mensagem' => 'Erro desconhecido'));
}