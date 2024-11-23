<?php
include "navbar.php";
?>
<head>
    <link rel="stylesheet" href="styles/style.css">

</head>

<div class="row">
    <h2 class="title mt-3">Encontre seu próximo trabalho no SmartObras</h2>

    <div class="col-md-3 ">
        <div class="card p-3 mt-5">
            <h5 class="mb-0">
                <button type="button" class="btn btn-primary d-md-none" data-bs-toggle="collapse" data-bs-target="#cardFiltros">
                    Filtros
                </button>
            </h5>
            <div class="collapse d-md-block" id="cardFiltros">
                <div class="card-body">
                    <h5 class="card-title">Filtros</h5>
                    <p class="fw-bold">Tipo do serviço</p>
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
                    <div id="tipo_orcamento">
                        <label for="orcamento" class="form-label">Tipo de pagamento</label>
                        <select name="orcamento" id="orcamento" class="form-select">
                            <option value="0">Qualquer</option>
                            <option value="1">Por hora</option>
                            <option value="2">Por dia</option>
                            <option value="3">Por m²</option>
                            <option value="4">Por serviço</option>
                        </select>
                    </div>
                    <br>
                    <div id="data">
                        <label for="data" class="form-label">Data de publicação</label>
                        <select name="data" id="filtroData" class="form-select">
                            <option value="1">Em qualquer momento</option>
                            <option value="2">Nas ultimas 24 horas</option>
                            <option value="3">Ultimos 3 dias</option>
                            <option value="4">Desde semana passada</option>
                            <option value="5">Mais de uma semana</option>
                        </select>
                    </div>
                    
                </div>
                <button class="btn btn-primary ms-3" id="filterButton">Aplicar Filtros</button>
            </div>
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