# Instruções para Configuração do Arquivo `config.env`

Para configurar o ambiente de desenvolvimento, você deve criar um arquivo chamado `config.env` com o seguinte conteúdo:

```php
<?php
  $server = "urlServidor"; // URL do servidor do banco de dados
  $db = "nomeBanco";       // Nome do banco de dados
  $user = "nomeUsuario";   // Nome de usuário para acessar o banco de dados
  $passw = "senhaBanco";   // Senha para acessar o banco de dados
?>