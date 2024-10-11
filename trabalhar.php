<?php
include "navbar.php";

/*if (empty($_SESSION["user"])) {
    header("Location: index.php");
}*/
?>
<head>
    <link rel="stylesheet" href="styles/style.css">

</head>

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
                <div id="orcamento">
                    <label for="orcamento" class="form-label">Tipo de pagamento</label>
                    <select name="orcamento" id="orcamento" class="form-select">
                        <option>Por hora</option>
                        <option>Por dia</option>
                        <option>Por m²</option>
                        <option>Por serviço</option>
                    </select>
                </div>
                <br>
                <div id="data">
                    <label for="data" class="form-label">Data de publicação</label>
                    <select name="data" id="data" class="form-select">
                        <option>Em qualquer momento</option>
                        <option>Nas ultimas 24 horas</option>
                        <option>Ultimos 3 dias</option>
                        <option>Desde semana passada</option>
                        <option>Mais de uma semana</option>
                    </select>
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