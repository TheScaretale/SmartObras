<?php include "navbar.php"; ?>
<div class="row">

    <!-- Lado esquerdo -->

    <div class="col-md-4 mt-4">
        <div class="card">
            <div class="card-body">
                <?php
                $user = $_SESSION["user"];
                $nomeSobrenome = explode(" ", $user);
                $nome = $nomeSobrenome[0];
                $sobrenome = isset($nomeSobrenome[1]) ? $nomeSobrenome[1] : '';
                ?>
                <div class="card-header d-flex justify-content-between align-items-start">
                    <h5 class="card-title">
                        Olá <?php echo $nome; ?><br>
                        <?php echo $sobrenome; ?>
                    </h5>
                    <div class="card-title">
                        <?php
                        if ($_SESSION["userType"] == "P") {
                            ?>
                            <a class="btn btn-primary" id="findJobs" href="trabalhar.php">Encontrar Trabalho</a>
                            <?php
                        } else {
                            ?>
                            <a class="btn btn-primary" id="createJobs" href="criarTrabalho.php">Criar trabalho</a>
                            <?php
                        } ?>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="ratings">
                        <i class="fa fa-star checked"></i>
                        <i class="fa fa-star checked"></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="text-end">
                        <h5 class="review-count m-1">Projetos</h5>
                        <p class="m-0">32</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Lado direito -->

    <div class="col-md-8 mt-4">
        <h3 class="card-title">Olá <?php echo $_SESSION["user"] ?></h3>
        <?php
            if($_SESSION["userType"] == "P"){
                ?>
                <h5>Aqui estão os trabalhos a realizar:</h5>
                <div class="list-group" id="profileJobs">

                </div>
                <?php
            }else{
                ?>
                <h5>Aqui estão seus trabalhos que você criou:</h5>
                <div class="list-group" id="profileJobsCliente">

                </div>
                <?php
            }
        ?>
<?php include "footer.php"; ?>