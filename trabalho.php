<?php
include "navbar.php";
include "./scripts/functions.php";

$isOwner = checkOwner();
?>
<?php if ($_SESSION["userType"] == "P") { ?>
    <div class="container mt-5" id="jobDetails">
<?php } elseif ($_SESSION["userType"] == "C" && $isOwner) { ?>
    <div class="container mt-5" id="jobDetailsClient">
<?php } elseif ($_SESSION["userType"] == "C") { ?>
    <div class="container mt-5" id="jobDetails">
<?php } else { ?>
    <div class="container mt-5">
<?php } ?>
    </div> <!-- Ensure this closing div is correctly placed -->

    <div class="modal fade" id="propostaModal" tabindex="-1" aria-labelledby="propostaModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="labelProposta">Adicionar proposta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating">
                        <textarea name="" id="mensagemProposta" class="form-control" placeholder="Deixe sua mensagem da proposta aqui" style="height: 150px;"></textarea>
                        <label for="mensagemProposta">Deixe uma mensagem.</label>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Seu orçamento:</label>
                        <input type="text" name="" id="orcamentoProposta" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Enviar proposta!</button>
                </div>
            </div>
        </div>
    </div>

<?php
include "footer.php";
?>