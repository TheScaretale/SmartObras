<?php
include_once "config.env";
try{
    $banco = new PDO("mysql:host=$server;dbname=$db",$user,$passw);
    $banco->exec("set names utf8");
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
}