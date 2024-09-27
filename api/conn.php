<?php
/**
 * Conexão com o banco de dados utilizando PDO.
 *
 * Este script estabelece uma conexão com o banco de dados MySQL utilizando as credenciais
 * fornecidas no arquivo "config.env". Em caso de falha na conexão, uma mensagem de erro
 * será exibida.
 *
 * @throws PDOException Se ocorrer um erro ao tentar se conectar ao banco de dados.
 */

include_once "config.env";
try{
    $banco = new PDO("mysql:host=$server;dbname=$db",$user,$passw);
    $banco->exec("set names utf8");
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
}