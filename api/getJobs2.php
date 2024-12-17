<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header('Content-Type: application/json');

include "conn.php";


$dados = json_decode(file_get_contents("php://input"), true);

if (isset($dados["getjobs"])) {

    $usuario = $_SESSION["userId"];
    $sql = "SELECT s.*, 
                DATEDIFF(CURDATE(), s.data_inclusao) AS diasPassados
                FROM servico s
                WHERE EXISTS 
                (SELECT * FROM servico_proposta sp 
                WHERE sp.id_servico = s.id_servicoProposta 
                AND sp.id_usuario = :usuario);";
    $consulta = $banco->prepare($sql);
    $consulta->bindParam(':usuario', $usuario);
    try {
        $consulta->execute();
        $servicos = array();
        
        while($registro = $consulta->fetch()){
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
                "diasPassados" => $registro["diasPassados"]
            );
        }
        echo json_encode($servicos);
    } catch (PDOException $e) {
        error_log("Erro na consulta SQL: " . $e->getMessage());
        echo json_encode(array('codigo' => 4, 'mensagem' => 'Erro na consulta ao banco de dados'));
    }
   
}else{
    echo json_encode(array('codigo' => 2, 'mensagem' => 'Erro desconhecido func 2'));
}
