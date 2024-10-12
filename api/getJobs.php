<?php

/**
 * Este script PHP é responsável por buscar e filtrar serviços de um banco de dados.
 * 
 * Funcionalidades:
 * - Permite requisições de qualquer origem (CORS).
 * - Aceita métodos POST, GET e OPTIONS.
 * - Define o tipo de conteúdo da resposta como JSON.
 * - Inclui um arquivo de conexão com o banco de dados.
 * - Decodifica dados JSON recebidos via `php://input`.
 * - Filtra serviços com base nos parâmetros fornecidos (azulejista, eletricista, hidráulica).
 * - Calcula a média de avaliações e o número de dias passados desde a inclusão do serviço.
 * - Retorna os serviços filtrados em formato JSON.
 * 
 * Parâmetros de entrada:
 * - `filtrar`: Indica se a filtragem deve ser aplicada.
 * - `azulejista`: Filtra serviços do tipo azulejista (1).
 * - `eletricista`: Filtra serviços do tipo eletricista (2).
 * - `hidraulica`: Filtra serviços do tipo hidráulica (3).
 * 
 * Estrutura da resposta JSON:
 * - `id_servico`: ID do serviço.
 * - `titulo`: Título do serviço.
 * - `descricao`: Descrição do serviço.
 * - `orcamento`: Orçamento do serviço.
 * - `id_tipo_servico`: ID do tipo de serviço.
 * - `id_usuario`: ID do usuário que criou o serviço.
 * - `id_status`: Status do serviço.
 * - `data_inclusao`: Data de inclusão do serviço.
 * - `data_validade`: Data de validade do serviço.
 * - `data_conclusao`: Data de conclusão do serviço.
 * - `avaliacao`: Média das avaliações do usuário.
 * - `diasPassados`: Número de dias passados desde a inclusão do serviço.
 * 
 * Em caso de erro, retorna um JSON com código 2 e mensagem de erro desconhecido.
 */

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);
if (isset($dados["source"])) {
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
            break;
        case 'perfil':
            $usuario = $_SESSION["userId"];
            $sql = "SELECT 
                        s.id_servico, s.titulo, s.descricao, s.orcamento, s.id_tipo_servico, s.id_usuario, s.id_status, s.data_inclusao, s.data_validade, s.data_conclusao,
                        (SELECT ROUND(AVG(ava_nota), 1) FROM avaliacao WHERE ava_id_usuario = s.id_usuario) AS avaliacao,
                        DATEDIFF(CURDATE(), s.data_inclusao) AS diasPassados,
                        (SELECT MAX(s.orcamento) FROM servico s) as valorMax,
                        (SELECT MIN(s.orcamento) FROM servico s) as valorMin
                    FROM servico s
                    WHERE s.id_usuario = ?";
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

    // Implement caching (example using file-based caching)
    $cacheFile = './cache/jobs.json';
    if (!file_exists($cacheFile)){
        file_put_contents($cacheFile, json_encode($servicos));
    }


    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < 3600) {
        // Serve from cache if cache is less than 1 hour old
        echo file_get_contents($cacheFile);
    } else {
        // Save to cache
        file_put_contents($cacheFile, json_encode($servicos));
        echo json_encode($servicos);
    }
} else {
    echo json_encode(array('codigo' => 2, 'mensagem' => 'Erro desconhecido'));
}