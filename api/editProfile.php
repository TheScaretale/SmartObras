<?php

include "conn.php";

$dados = json_decode(file_get_contents('php://input'), true);

if(isset($dados["perfil"])){
    $usuario = $_SESSION["userId"];
    $params = [];

    switch($dados){
        case "abrir":
            $sql = "SELECT * FROM usuario WHERE id_usuario = :id";
            $params = [':id' => $usuario];
            break;
        case "editar":
            $sql = "";
            $params = [
                "email" => $dados["email"],
                "telefone" => $dados["telefone"],
                "foto" => $dados["foto"],
            ];
            break;
    }


}