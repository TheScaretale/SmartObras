<?php
include "navbar.php";
?>
<div class="container mt-5" id="jobDetails">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Lorem ipsum dolor</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, dolorem?</p>
                    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam officiis non delectus sapiente rem, facilis at nesciunt aperiam veritatis animi vitae maxime quae nobis libero in rerum earum doloribus? Perferendis.</h6>
                    <p>Colocar azuleijo no banheiro</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-end">R$ 150 - 200</h5>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary">Fazer uma proposta</button>
                    </div>
                    <hr>
                    <div class="card mt-4">
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

                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn btn-primary" id="getUserReviews" href="contratar.php">Criar trabalho</a>
                                        <?php
                                    } ?>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="ratings">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="text-end">
                                    <p class="m-0">32</p>
                                    <h5 class="review-count m-0">Projetos</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6>Atividades neste projeto</h6>
                    <p class="mb-0">2 Propostas</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
