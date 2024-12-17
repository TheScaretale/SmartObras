<?php
function checkOwner()
{
    include "./api/conn.php";
    $id_usuario = $_SESSION["userId"];
    $servicoId = $_GET['id_servico']; // Get the service ID from the URL

    // Debugging statements

    try {
        $sql = "SELECT id_usuario FROM servico WHERE id_servico = :id_servico";
        $consulta = $banco->prepare($sql);
        $consulta->bindParam(':id_servico', $servicoId);
        $consulta->execute();
        $servico = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($servico) {
            // Debugging statement
            
            return $servico['id_usuario'] == $id_usuario;
        } else {
            echo "Service not found.<br>";
            return false;
        }
    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
}