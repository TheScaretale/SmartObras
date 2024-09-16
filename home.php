<?php include "navbar.php"; ?>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Olá <?php echo $_SESSION["user"] ?></h5>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="ratings">
                        <i class="fa fa-star checked"></i>
                        <i class="fa fa-star checked"></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star "></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <h5 class="review-count">12 Reviews</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <h3 class="card-title">Olá <?php echo $_SESSION["user"] ?></h3>
        
        <button class="btn btn-primary" id="getUserReviews" onclick="getReviews()">Pegar dados</button>

        <table class="table table-striped" id="reviewsTable">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Comentário</th>
                    <th scope="col">Média</th>
                </tr>
            </thead>
            <tbody>
                <!-- Populado pelo javascript -->
            </tbody>
        </table>

    </div>
</div>
<?php include "footer.php"; ?>