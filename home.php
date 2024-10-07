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
                            <a class="btn btn-primary" id="createJobs" href="contratar.php">Criar trabalho</a>
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
                        <p class="m-0">32</p>
                        <h5 class="review-count m-0">Projetos</h5>
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

<!-- Botão para abrir o chat -->
<div id="chat-button" class="btn btn-primary rounded-circle p-3 position-fixed bottom-0 end-0 m-4 shadow" style="width: 60px; height: 60px;">
  <i class="fas fa-comments"></i>
</div>

<!-- Janela do chat -->

            <div class="col-md-10 col-lg-8 col-xl-6">
              <div class="card" id="chat2">
                <div class="card-header d-flex justify-content-between align-items-center p-3">
                  <h5 class="mb-0">Chat</h5>
                  <button type="button" class="btn btn-primary btn-sm">Let's Chat App</button>
                </div>
                <div class="card-body" style="position: relative; height: 400px">
                  <!-- Corpo do chat aqui -->
                </div>
                <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 3" style="width: 40px; height: 100%;">
                  <input type="text" class="form-control form-control-lg" placeholder="Type message">
                  <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                  <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                  <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>
                </div>
              </div>
            </div>
          

<!-- Link para Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">





    </div>
</div>
<?php include "footer.php"; ?>