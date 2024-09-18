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
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" role="switch" id="switch1">
                    <label for="switch1" class="form-check-label">Alguma coisa</label>
                </div>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" role="switch" id="switch2">
                    <label for="switch2" class="form-check-label">Outra coisa</label>
                </div>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" role="switch" id="switch3">
                    <label for="switch3" class="form-check-label">Mais alguma coisa</label>
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
                            <h6 class="mb-0">List group item heading</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">now</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32"
                        class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Another title here</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph that goes a little longer
                                so it wraps to a new line.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">3d</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32"
                        class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Third heading</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>