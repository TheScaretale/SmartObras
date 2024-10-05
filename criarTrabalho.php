<?php
include "navbar.php";
?>
<div class="row">
    <div class="col-md-4 mt-4">
        <!-- Cria o form aqui -->
        <div class="mb-3">
            <label class="form-label" for="">Titulo do Serviço</p>
                <input class="form-control" type="text" placeholder="Titulo" id="titulo">
        </div>
        <div class="mb-3">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Descricao" id="descricao"></textarea>
                <label for="floatingTextarea">Descrição</label>
            </div>
        </div>
        <label class="form-label" for="orcamento">Orçamento</label>
        <div class="input-group mb-3">
            <span class="input-group-text">R$</span>
            <input type="text" id="orcamento" class="form-control" aria-label="Amount (to the nearest dollar)">
        </div>
        <label class="form-label">Qual o tipo do serviço</label>
        <select class="form-select form-select-sm" id="tipo_servico" aria-label="Small select example">
            <option selected>Selecione o tipo de servico</option>
            <option value="1">Azulejista</option>
            <option value="2">Eletricista</option>
            <option value="3">hidraulica</option>
        </select>
        <div class="my-3">
            <button class="btn btn-primary" id="criarJob" onclick="createJob()">Criar trabalho</button>
        </div>
    </div>
</div>
    <div class="col-md-4 mt-4">

    </div>
    
<?php
include "footer.php";
?>