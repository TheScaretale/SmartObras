<?php
include "navbar.php";
?>
<div class="row">
<div class="col-md-8 mt-4">
        <!-- Cria o form aqui -->
        <div class="mb-3">
            <label class="form-label" for="">Titulo do Serviço</p>
                <input class="form-control" type="text" placeholder="Titulo" aria-label=".form-control-sm example" id="titulo">
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
        <label class="form-label">Qual o status do pedido</label>
        <select class="form-select form-select-sm" aria-label="Small select example" id="status">
            <option selected>Selecione qual o status do seu pedido</option>
            <option value="1">Em Andamento</option>
            <option value="2">Fechado</option>
            <option value="3">Aberto</option>
            <option value="4">Concluido</option>
        </select>
        <label class="form-label">Data Validade</label>
        <div class="form-group" id="date">
            <div class="input-group date" id="datepicker">
                <input type="text" id="dataValidade" class="form-control" placeholder="MM/DD/YYYY">
                <span class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                    </span>
                </span>
            </div>
        </div>
        <label class="form-label">Data Conclução</label>
        <div class="form-group" id="date">
            <div class="input-group date" id="datepicker">
                <input type="text" id="dataConclusão" class="form-control" placeholder="MM/DD/YYYY">
                <span class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                    </span>
                </span>
            </div>
        </div>
    </div>
</div>
    <div class="col-md-4 mt-4">

    </div>
    
<?php
include "footer.php";
?>