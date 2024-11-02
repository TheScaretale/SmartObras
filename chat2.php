<?php include "navbar.php" ?>

<style>
    /* Estilos gerais */
    .text-white {
        color: inherit !important;
    }

    .nav-link {
        background-color: transparent !important;
        color: inherit !important;
    }

    .nav-link.active,
    .nav-pills .nav-link.active {
        background-color: transparent !important;
        color: inherit !important;
    }

    .bg-light .nav-link,
    .bg-light .nav-link.active {
        color: #333 !important;
    }

    /* Estilo da barra lateral */
    .sidebar {
        background-color: #f8f9fa;
        min-height: 100vh;
        padding: 20px;
    }

    .sidebar .list-group-item {
        border: none;
    }

    /* Estilo da área de chat */
    .chat-container {
        padding: 20px;
    }

    .chat-box {
        max-width: 60%;
        margin-bottom: 15px;
    }

    .chat-input {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .chat-input textarea {
        flex: 1;
        resize: none;
        border-radius: 10px;
    }

    .mensagem-remetente {
        margin-left: auto;
    }

    .mensagem-destinatario {
        margin-right: auto;
    }

    /* Estilo do botão */
    .chat-input button {
        margin-left: auto;
    }
</style>


        <!-- Área de Chat -->
        <div class="col chat-container" id="janelaChat">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Nome do usuário</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <!-- Mensagem do destinatário -->
                        <div class="col-md-5 chat-box mensagem-destinatario">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p id="mensagemDestinatario">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis minima veniam quo voluptate omnis ut officia repudiandae minus possimus ducimus, optio expedita consequatur excepturi iusto quos porro nihil, cum officiis? Architecto illo ad inventore reiciendis, eveniet aliquam ea voluptates quidem fugit perspiciatis praesentium quas velit quis asperiores adipisci laborum est!</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-100"></div>

                        <!-- Mensagem do remetente -->
                        <div class="col-md-5 chat-box mensagem-remetente">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p id="mensagemRemetente">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia soluta repellat ipsam optio dolores? Blanditiis ad aspernatur ratione error libero. Perferendis obcaecati in ipsam quos. At velit amet illum cumque.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Caixa de entrada de mensagem -->
                    <div class="chat-input">
                        <textarea class="form-control" placeholder="Digite sua mensagem..." id="auto-resize" rows="1" oninput="autoResize(this)"></textarea>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>
