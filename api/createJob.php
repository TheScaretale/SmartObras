<?php
    header("Access-Control-Allow-Origin: *");

    require "conn.php";

    $dados = json_decode(file_get_contents("php://input"), true);
    if(isset($dados["criar"])){
        if (!isset($_SESSION["userId"])) {
            echo json_encode(array('codigo' => 4, 'mensagem' => 'Usuário não autenticado'));
            exit;
        }
        $titulo = $dados["titulo"];
        $descricao = $dados["descricao"];
        $orcamento = $dados["orcamento"];
        $id_tipo_servico = $dados["id_tipo_servico"];
        $id_usuario = $_SESSION["userId"];
        $tipo_pagamento = $dados["tipo_pagamento"];

        $sql = "INSERT INTO servico
            (titulo, descricao, orcamento, id_tipo_servico, id_usuario, id_status, data_inclusao, data_validade, tipo_pagamento)
            VALUES 
            (:titulo, :descricao, :orcamento, :id_tipo_servico, :id_usuario, 1, NOW(), date_add(now(), interval 1 month), :tipo_pagamento);";
        $consulta = $banco->prepare($sql);
        $consulta->bindParam(':titulo', $titulo);
        $consulta->bindParam(':descricao', $descricao);
        $consulta->bindParam(':orcamento', $orcamento);
        $consulta->bindParam(':id_tipo_servico', $id_tipo_servico);
        $consulta->bindParam(':id_usuario', $id_usuario);
        $consulta->bindParam(':tipo_pagamento', $tipo_pagamento);
        $consulta->execute();
        
        if($consulta == true){
            echo json_encode(array('codigo'=>1, 'mensagem'=>'Serviço cadastrado com sucesso!'));
        }else{
            echo json_encode(array('codigo'=>2, 'mensagem'=>'Erro ao cadastrar serviço!'));
        }
    }else{
        echo json_encode(array('codigo'=>3, 'mensagem'=>'Erro desconhecido'));
    }
