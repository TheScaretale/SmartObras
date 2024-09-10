<?php include "navbar.php"; ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Olá <?php echo $_SESSION["user"] ?></h5>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h3 class="card-title">Olá <?php echo $_SESSION["user"] ?></h3>
    </div>
</div>
<?php include "footer.php"; ?>