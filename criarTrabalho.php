<?php
include "navbar.php";
?>

<head>
    <link rel="stylesheet" href="styles/cadastro.css">
</head>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card mt-4" style="width: 500px;">
        <div class="card-body">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <!-- Cria o form aqui -->
                <div class="mb-3 w-100">
                    <label class="form-label" for="titulo">Título do Serviço</label>
                    <input class="form-control" type="text" placeholder="Título" id="titulo">
                </div>
                <div class="mb-3 w-100">
                    <label for="descricao" class="form-label">Descrição do serviço</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Descrição" id="descricao"></textarea>
                        <label for="descricao">Descrição</label>
                    </div>
                </div>
                <div class="mb-3 w-100">
                    <label class="form-label">Qual o tipo do serviço</label>
                    <select class="form-select form-select-sm" id="tipo_servico">
                        <option selected>Selecione o tipo de serviço</option>
                        <option value="1">Azulejista</option>
                        <option value="2">Eletricista</option>
                        <option value="3">Hidráulica</option>
                    </select>        
                </div>
                <div class="mb-3 w-100">
                    <label class="form-label" for="orcamento">Orçamento</label>
                    <div class="input-group">
                        <span class="input-group-text">R$</span>
                        <input type="text" id="orcamento" class="form-control" aria-label="Amount">
                    </div>
                </div>
                <div class="mb-3 w-100">
                    <label for="tipoOrcamento" class="form-label">Qual o tipo do orçamento?</label>
                    <select id="tipoOrcamento" class="form-select form-select-sm">
                        <option value="1">Por hora</option>
                        <option value="2">Por dia</option>
                        <option value="3">Por m²</option>
                        <option value="4">Por serviço</option>
                    </select>
                </div>
                <div class="my-3 w-100" style="display: flex; justify-content: center;">
                    <button class="botaoo" id="criarJob" onclick="createJob()">Criar trabalho</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
        </div>
    </div>
</div>
</div>
</div>

<?php
include "footer.php";
?>