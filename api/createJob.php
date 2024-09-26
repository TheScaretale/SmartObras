<?php
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

        $sql = "INSERT INTO usuario
            (titulo, descricao, orcamento, id_tipo_servico, id_usuario, id_status, data_inclusao, data_validade, data_conclusao)
            VALUES 
            (:titulo, :descricao, :orcamento, :id_tipo_servico, :id_usuario, :id_status, NOW(), :data_validade, :data_conclusao)";
        $consulta = $banco->prepare($sql);
        $consulta->bindParam(':titulo', $titulo);
        $consulta->bindParam(':descricao', $descricao);
        $consulta->bindParam(':orcamento', $orcamento);
        $consulta->bindParam(':id_tipo_servico', $id_tipo_servico);
        $consulta->bindParam(':id_usuario', $id_usuario);
        $consulta->bindParam(':id_status', $id_status);
        $consulta->bindParam(':data_validade', $data_validade);
        $consulta->bindParam(':data_conclusao', $data_conclusao);
        $consulta->execute();
        
        if($consulta == true){
            echo json_encode(array('codigo'=>1, 'mensagem'=>'Serviço cadastrado com sucesso!'));
        }else{
            echo json_encode(array('codigo'=>2, 'mensagem'=>'Erro ao cadastrar serviço!'));
        }
    }else{
        echo json_encode(array('codigo'=>3, 'mensagem'=>'Erro desconhecido'));
    }
