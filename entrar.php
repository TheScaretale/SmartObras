 <!-- NavBar -->
<?php
session_start();
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartObras</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="icon" href="assets/capacete.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <style>
      body {
        background-color: #f25c05;
      }
      .text-start {
    text-align: left;
}
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        <?php
                if(empty($_SESSION["user"])){
            ?>
            <a href="index.php" class="navbar-brand">
                <img src="assets/logo.png" alt="" width="150" height="50">
            </a>
            <?php
                } else {
            ?>
            <a href="home.php" class="navbar-brand">
                <img src="assets/logo.png" alt="" width="150" height="50">
            </a>
            <?php
                }
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#conteudoNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="conteudoNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    if (!empty($_SESSION["user"])) {
                    ?>

                        <li class="nav-item">
                            <a href="trabalhar.php" class="nav-link">Encontre trabalho</a>
                        </li>
                        <li class="nav-item">
                            <a href="contratar.php" class="nav-link">Encontre profissionais</a>
                        </li>
                        <li class="nav-item">
                            <a href="criarTrabalho.php" class="nav-link">Criar trabalho</a>
                        </li>
                        <li class="nav-item">
                            <a href="encontrartrabalho.php" class="nav-link">Encontrar trabalho</a>
                        </li>
                        <li class="nav-item">
                            <a href="sobre.php" class="nav-link">Sobre</a>
                        </li>
                </ul>
                <div class="d-flex">
                    <a href="index.php?logout" class="botaoo" type="submit">Sair</a>
                </div>

            <?php
                    } else {
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="cadastro.php" class="nav-link">Quero contratar</a>
                    </li>
                    <li class="nav-item">
                        <a href="cadastro.php" class="nav-link">Quero trabalhar</a>
                    </li>

                <?php
                    }
                ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container justify-content-center">
    </div>

 <!-- parte entrar -->
 <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
 <div class="card mt-4" style="width: 500px;"> 
            <div class="card-body text-center" id="logimForm">
                <div class="mb-3">
                    <label for="email" class="form-label">Endereço de email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Nunca iremos compartilhar essa informação com alguém.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password">
                  </div>
                <div class="mb-3 form-check text-start">
                    <input type="checkbox" class="form-check-input" id="checkRemember">
                    <label class="form-check-label" for="checkRemember">Lembre-me</label>
                <div class="text-start mb-3">
                    <a href="esquecisenha.php">Esqueceu a senha?</a>
                </div>
                </div>
                <btn class="botaoo" id="btnEntrar" type="submit">Entrar</btn>
            </div>
    </div>
</div>



 <!-- Footer -->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="scripts/main.js"></script>
</body>
</html>