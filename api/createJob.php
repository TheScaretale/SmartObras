<?php
/**
 * Este script cria um novo serviço no banco de dados.
 * 
 * Cabeçalhos:
 * - Access-Control-Allow-Origin: *
 * 
 * Dependências:
 * - conn.php: Arquivo de conexão com o banco de dados.
 * 
 * Entrada:
 * - JSON via php://input contendo os seguintes campos:
 *   - criar: Flag para indicar a criação do serviço.
 *   - titulo: Título do serviço.
 *   - descricao: Descrição do serviço.
 *   - orcamento: Orçamento do serviço.
 *   - id_tipo_servico: ID do tipo de serviço.
 *   - id_status: ID do status do serviço.
 *   - data_validade: Data de validade do serviço.
 *   - data_conclusao: Data de conclusão do serviço.
 * 
 * Saída:
 * - JSON com os seguintes campos:
 *   - codigo: Código de status da operação (1 para sucesso, 2 para erro ao cadastrar, 3 para erro desconhecido).
 *   - mensagem: Mensagem descritiva do status da operação.
 * 
 * Operações:
 * - Decodifica o JSON de entrada.
 * - Verifica se o campo "criar" está presente.
 * - Insere um novo registro na tabela "servico" com os dados fornecidos.
 * - Retorna um JSON indicando o sucesso ou falha da operação.
 * 
 * Observações:
 * - A data de inclusão é definida automaticamente como a data e hora atuais.
 * - A data de validade é definida automaticamente como um mês após a data de inclusão.
 * - O ID do usuário é obtido da sessão atual ($_SESSION["userId"]).
 */

    header("Access-Control-Allow-Origin: *");

    require "conn.php";

    $dados = json_decode(file_get_contents("php://input"), true);
    if(isset($dados["criar"])){

        $titulo = $dados["titulo"];
        $descricao = $dados["descricao"];
        $orcamento = $dados["orcamento"];
        $id_tipo_servico = $dados["id_tipo_servico"];
        $id_usuario = $_SESSION["userId"];
        $id_status = $dados["id_status"];
        $data_validade = $dados["data_validade"];
        $data_conclusao = $dados["data_conclusao"];

        $sql = "INSERT INTO servico
            (titulo, descricao, orcamento, id_tipo_servico, id_usuario, id_status, data_inclusao, data_validade)
            VALUES 
            (:titulo, :descricao, :orcamento, :id_tipo_servico, :id_usuario, :id_status, NOW(), date_add(now(), interval 1 month))";
        $consulta = $banco->prepare($sql);
        $consulta->bindParam(':titulo', $titulo);
        $consulta->bindParam(':descricao', $descricao);
        $consulta->bindParam(':orcamento', $orcamento);
        $consulta->bindParam(':id_tipo_servico', $id_tipo_servico);
        $consulta->bindParam(':id_usuario', $id_usuario);
        $consulta->bindParam(':id_status', $id_status);
        $consulta->execute();
        
        if($consulta == true){
            echo json_encode(array('codigo'=>1, 'mensagem'=>'Serviço cadastrado com sucesso!'));
        }else{
            echo json_encode(array('codigo'=>2, 'mensagem'=>'Erro ao cadastrar serviço!'));
        }
    }else{
        echo json_encode(array('codigo'=>3, 'mensagem'=>'Erro desconhecido'));
    }
