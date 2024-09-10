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
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus distinctio, aut eveniet reprehenderit recusandae obcaecati molestias possimus dolorum ut minus numquam veritatis ipsum quasi tempora facilis illum voluptates iste laboriosam incidunt ipsam sunt sequi nesciunt laborum. Magni minima pariatur aspernatur, voluptatum possimus ratione architecto officia labore, praesentium vero officiis cumque eos dolore est reiciendis. Culpa quod reprehenderit consequatur aperiam at eos cumque laudantium quasi praesentium sed sunt earum nostrum natus expedita iusto, soluta consequuntur omnis eveniet modi ipsam vel corporis aliquid autem? Sapiente veritatis corrupti neque suscipit sunt necessitatibus facilis vero ad illo, officiis autem provident est error tempora doloribus, temporibus eaque rerum! Est temporibus saepe officiis ipsum expedita voluptate nisi nemo alias aliquid magnam dicta, obcaecati recusandae minima illo magni enim odit fugiat nihil possimus. Deserunt eius quisquam officia expedita, dolore eum quaerat praesentium? Excepturi et ea accusantium sint ullam odio, voluptates rerum amet nam aperiam animi soluta sunt!</p>
    </div>
</div>
<?php include "footer.php"; ?>