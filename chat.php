<?php include "navbar.php" ?>

<!-- Área de Chat -->
<div class="col chat-container" id="janelaChat">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-start">
                <img id="ft_perfil" src="https://github.com/twbs.png" alt="twbs" width="40" height="40" class="rounded-circle flex-shrink-0">
                <h5 id="msg_nome" class="card-title ms-2 mb-0">Nome do usuário</h5>
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
                <textarea
                    class="form-control"
                    placeholder="Digite sua mensagem..."
                    id="chatInput"
                    rows="1"
                    oninput="handleInput(this)">
                </textarea>
                <div class="me-3"></div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>