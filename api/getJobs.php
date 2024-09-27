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
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

include "conn.php";


$dados = json_decode(file_get_contents("php://input"), true);
if (isset($dados["filtrar"])) {
    $sql = "SELECT 
    s.*, 
    (SELECT ROUND(AVG(ava_nota), 1) 
        FROM avaliacao 
        WHERE ava_id_usuario = id_usuario) AS avaliacao,
        DATEDIFF(CURDATE(), data_inclusao) AS diasPassados
        FROM servico s WHERE 1=1";

    $tipos = "";
    $ctrl = "";
    if (isset($dados["azulejista"]) && $dados["azulejista"] == 1) {
        $tipos .= $ctrl . "1";
        $ctrl = ",";
    }
    if (isset($dados["eletricista"]) && $dados["eletricista"] == 2) {
        $tipos .= $ctrl . "2";
        $ctrl = ",";
    }
    if (isset($dados["hidraulica"]) && $dados["hidraulica"] == 3) {
        $tipos .= $ctrl . "3";
        $ctrl = ",";
    }
    if ($tipos <> "") {
        $sql .= " AND id_tipo_servico IN ($tipos)";
    }

    $consulta = $banco->prepare($sql);
    $consulta->execute();

    $servicos = array();


    while ($registro = $consulta->fetch()) {
        $servicos[] = array(
            "id_servico" => $registro["id_servico"],
            "titulo" => $registro["titulo"],
            "descricao" => $registro["descricao"],
            "orcamento" => $registro["orcamento"],
            "id_tipo_servico" => $registro["id_tipo_servico"],
            "id_usuario" => $registro["id_usuario"],
            "id_status" => $registro["id_status"],
            "data_inclusao" => $registro["data_inclusao"],
            "data_validade" => $registro["data_validade"],
            "data_conclusao" => $registro["data_conclusao"],
            "avaliacao" => $registro["avaliacao"],
            "diasPassados" => $registro["diasPassados"]
        );
    }


    header('Content-Type: application/json');
    echo json_encode($servicos);
} else {
    echo json_encode(array('codigo' => 2, 'mensagem' => 'Erro desconhecido'));
}
