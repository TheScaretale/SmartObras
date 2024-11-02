<?php
/**
 * Este script PHP é responsável por obter informações de serviços (jobs) a partir de uma fonte especificada.
 * Ele permite filtrar os serviços com base em vários critérios, como tipo de serviço, orçamento e intervalo de tempo.
 * 
 * Funcionalidades:
 * - Filtrar serviços com base em critérios específicos.
 * - Obter perfil de serviços de um usuário específico.
 * 
 * Requisitos:
 * - O usuário deve estar autenticado para acessar os dados.
 * 
 * Parâmetros de entrada (JSON):
 * - source: Define a fonte da solicitação (ex: 'filtrar', 'perfil').
 * - azulejista: (opcional) Filtra serviços do tipo azulejista.
 * - eletricista: (opcional) Filtra serviços do tipo eletricista.
 * - hidraulica: (opcional) Filtra serviços do tipo hidráulica.
 * - orcamento: (opcional) Filtra serviços com base no tipo de pagamento.
 * - intervalo: (opcional) Filtra serviços com base no intervalo de tempo desde a data de inclusão.
 * 
 * Respostas JSON:
 * - Código 2: Erro desconhecido.
 * - Código 3: Fonte desconhecida.
 * - Código 4: Usuário não autenticado.
 * - Lista de serviços filtrados ou perfil de serviços do usuário.
 * 
 * Dependências:
 * - Conexão com o banco de dados (conn.php).
 * 
 * @package SmartObras
 * @subpackage API
 * @version 1.0
 */



header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);
if (isset($dados["source"])) {
    if (!isset($_SESSION["userId"])) {
        echo json_encode(array('codigo' => 4, 'mensagem' => 'Usuário não autenticado'));
        exit;
    }
    $usuario = $_SESSION["userId"];
    $tipoUsu = $_SESSION["userType"];
    $source = $dados["source"];
    $sql = "";
    $params = [];

    switch ($source) {
        case 'filtrar':
            $sql = "SELECT 
                        s.*, 
                        (SELECT ROUND(AVG(ava_nota), 1) FROM avaliacao WHERE ava_id_usuario = s.id_usuario) AS avaliacao,
                        DATEDIFF(CURDATE(), s.data_inclusao) AS diasPassados
                    FROM servico s
                    JOIN tipo_pagamento tp ON tp.id_tipo_pagamento = s.tipo_pagamento
                    WHERE 1=1";

            $tipos = [];
            if (isset($dados["azulejista"]) && $dados["azulejista"] == 1) {
                $tipos[] = 1;
            }
            if (isset($dados["eletricista"]) && $dados["eletricista"] == 2) {
                $tipos[] = 2;
            }
            if (isset($dados["hidraulica"]) && $dados["hidraulica"] == 3) {
                $tipos[] = 3;
            }
            
            if (!empty($tipos)) {
                $placeholders = implode(',', array_fill(0, count($tipos), '?'));
                $sql .= " AND s.id_tipo_servico IN ($placeholders)";
                $params = array_merge($params, $tipos);
            }

            if (isset($dados["orcamento"]) && $dados["orcamento"] !== null) {
                $sql .= " AND s.tipo_pagamento = ?";
                $params[] = $dados["orcamento"];
            }

            if(isset($dados["intervalo"])){
                switch($dados["intervalo"]){
                    case "2":
                        $sql .= " AND s.data_inclusao >= CURDATE() - INTERVAL 1 DAY";
                        break;
                    case "3":
                        $sql .=" AND s.data_inclusao >= CURDATE() - INTERVAL 3 DAY";
                        break;
                    case "4":
                        $sql .=" AND s.data_inclusao >= CURDATE() - INTERVAL 1 WEEK";
                        break;
                    case "5":
                        $sql .=" AND s.data_inclusao >= 
                        CURDATE() - INTERVAL 1 MONTH";
                        break;
                    case 1:
                        break;
                    default:
                        break;
                }
            }
            break;

        case 'perfil':
            $sql = "SELECT 
    s.id_servico,
    s.titulo,
    s.descricao,
    s.orcamento,
    s.id_tipo_servico,
    s.id_usuario,
    s.id_status,
    s.data_inclusao,
    s.data_validade,
    s.data_conclusao,
    (SELECT ROUND(AVG(ava_nota), 1) FROM avaliacao WHERE ava_id_usuario = s.id_usuario) AS avaliacao,
    DATEDIFF(CURDATE(), s.data_inclusao) AS diasPassados,
    (SELECT MAX(orcamento) FROM servico) AS valorMax,
    (SELECT MIN(orcamento) FROM servico) AS valorMin,
    (SELECT COUNT(*) FROM servico where id_usuario = s.id_usuario) AS totalTrabalhos
FROM servico s
WHERE s.id_usuario = ?;";
            $params[] = $usuario;
            break;
        default:
            echo json_encode(array('codigo' => 3, 'mensagem' => 'Source desconhecido'));
            exit;
    }
    $consulta = $banco->prepare($sql);
    $consulta->execute($params);

    $servicos = array();
    while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $servicos[] = $registro;
    }

    echo json_encode($servicos);
} else {
    echo json_encode(array('codigo' => 2, 'mensagem' => 'Erro desconhecido'));
}