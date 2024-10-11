<?php

include "conn.php";

try {
    $sql = "SELECT COUNT(id_servico) AS total FROM servico";
    $consulta = $banco->prepare($sql);
    $consulta->execute();
    $total = $consulta->fetch(PDO::FETCH_ASSOC);
    echo json_encode($total);
} catch (PDOException $e) {
    echo json_encode(array('codigo' => 2, 'mensagem' => 'Erro desconhecido'));
}