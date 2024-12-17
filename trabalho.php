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
                <?php if ($_SESSION["userType"] == "P") { ?>
                    <div class="modal fade" id="propostaModal" tabindex="-1" aria-labelledby="propostaModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="labelProposta">Adicionar proposta</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="idServico" id="idServico">
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
                                    <button type="button" class="btn btn-primary" onclick="makeOffer()">Enviar proposta!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="modal fade" id="editarTrabalho" tabindex="-1" aria-labelledby="editarTrabalho">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="labelEditarTrabalho">Editar trabalho</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="form">
                                        <input type="hidden" name="idServico" id="idServico">
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <input type="text" name="" id="tituloTrabalho" class="form-control">
                                                <label for="tituloTrabalho">Título do trabalho</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <textarea name="" id="descricaoTrabalho" class="form-control" placeholder="Descreva o trabalho aqui" style="height: 150px;"></textarea>
                                                <label for="descricaoTrabalho">Descrição do trabalho</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Seu orçamento:</label>
                                            <input type="text" name="" id="orcamentoTrabalho" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onclick="editJob()">Salvar alterações</button>
                                </div>
                            </div>

                        <?php } ?>

                        <?php
                        include "footer.php";
                        ?>