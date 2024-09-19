<?php
include "navbar.php";

/*if (empty($_SESSION["user"])) {
    header("Location: index.php");
}*/
?>

<div class="row">
    <h2 class="title mt-3">Encontre seu próximo trabalho no SmartObras</h2>


    <div class="col-md-3 ">
        <div class="card p-3 mt-5">
            <div class="card-body">
                <h5 class="card-title">Filtros</h5>
                <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Elétrica
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Azulejista
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Hidráulica
            </label>
        </div>
            </div>
        </div>
    </div>



    <div class="col-lg-8">
        <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
            <div class="list-group" id="jobsTable">
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32"
                        class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Azulejista</h6>
                            <br>
                            <p class="mb-0 opacity-75">Lorem ipsum dolor, sit amet consectetur adipisicing elit. A blanditiis dolorum itaque animi officiis inventore illo ipsa laudantium pariatur aliquid corrupti, atque perferendis nam alias, enim asperiores maxime molestias! Deleniti ex laudantium nemo obcaecati nam harum mollitia hic laborum at atque? Quam, nostrum nesciunt sint numquam consectetur id unde esse?
                            </p>
                            lore
                        </div>

                        <div class=" flex-direction: column;">
                        <small class="opacity-90 text-nowrap">R$100,00 por hora</small>
                        <small class="opacity-50 text-nowrap align-self: flex-end">now</small>
                        </div>

                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32"
                        class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Elétricista</h6>
                            <br>
                            <p class="mb-0 opacity-75">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus aliquam voluptatibus dolore provident iste? Exercitationem rem animi, praesentium vel ex officiis corporis recusandae in, soluta, et iure assumenda libero laboriosam?
                            </p>
                            lore
                        </div>

                        <div class=" flex-direction: column;">
                                <small class="opacity-90 text-nowrap">R$100,00 por hora</small>
                                <small class="opacity-50 text-nowrap">3d</small>
                        </div>

                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32"
                        class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Trabalho com Hidráulica</h6>
                            <br>
                            <p class="mb-0 opacity-75">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non mollitia sit placeat numquam quasi cum, architecto libero! Consequatur cumque totam dolores dicta autem! Neque tempora enim necessitatibus minus! Voluptatem, ullam?
                            </p>
                            lore
                        </div>

                        <div class=" flex-direction: column;">
                            <small class="opacity-90 text-nowrap">R$100,00 por hora</small>
                            <small class="opacity-50 text-nowrap">1w</small>
                        </div>

                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>