<?php
session_start();
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
}

if (empty($_SESSION["user"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartObras</title>
    <link rel="icon" href="assets/capacete.png">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <?php
            if (empty($_SESSION["user"])) {
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
                   <!--      <li class="nav-item">
                            <a href="contratar.php" class="nav-link">Encontre profissionais</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="criarTrabalho.php" class="nav-link">Criar trabalho</a>
                        </li>
                        <li class="nav-item">
                            <a href="listaConversas.php" class="nav-link">Mensagens</a>
                        </li>
                        <li class="nav-item">
                            <a href="sobre.php" class="nav-link">Sobre</a>
                        </li>
                        
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="perfil.php" class="nav-link">
                                <i class="bi bi-person" style="color: #000000;"></i> Perfil
                            </a>
                        </li>
                    </ul>

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