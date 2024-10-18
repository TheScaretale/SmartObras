<?php

header("Content-Type: application/json; charset=UTF-8");

include "conn.php";

$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados["proposta"])){
    
}