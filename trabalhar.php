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
                <p class="fw-bold">Project Type</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="azulejista" id="tipoEletrica">
                    <label class="form-check-label" for="flexCheckDefault">
                        Elétrica
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="eletricista" id="tipoAzulejista">
                    <label class="form-check-label" for="flexCheckDefault">
                        Azulejista
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="hidraulica" id="tipoHidraulica">
                    <label class="form-check-label" for="flexCheckDefault">
                        Hidráulica
                    </label>
                </div>
                <br>
                <div class="price" id="precoOrcamento">
                    <p class="fw-bold">Preço do Orçamento</p>
                    <input id="sliderValor" type="range" class="form-range" id="rangeValues" min="0" max="100" value="50" oninput="this.nextElementSibling.value = this.value">
                    <output>50</output>
                </div>
                <br>
                <p class="fw-bold">Data</p>
                <div class="form-group" id="date">
                    <label for="date" class="form-label">Data</label>
                    <div class="col-sm-8">
                        <div class="input-group date" id="datepicker">
                            <input type="text" name="" id="" class="form-control" placeholder="DD/MM/AAAA">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" id="filterButton">Pegar trabalhos</button>
        </div>
    </div>



    <div class="col-lg-8">
        <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
            <div class="list-group" id="jobsContainer">
                
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>