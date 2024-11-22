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
    padding: 8px;
    border-radius: 30px;
    box-shadow: none; /* Remove o efeito de sombra */
    background-color: transparent; /* Remove o fundo cinza */
}

.chat-textarea {
    flex: 1;
    border: 1px solid #ccc; /* Adiciona uma borda leve para visualização */
    outline: none;
    resize: none;
    padding: 10px 12px;
    font-size: 14px;
    border-radius: 20px;
    max-height: 100px; /* Altura máxima para 4 linhas */
    overflow-y: hidden; /* Exibe barra de rolagem se necessário */
    background-color: white; /* Fundo do textarea para contraste */
    transition: overflow-y 0.2s; /* Transição suave para exibir a barra */
}

.chat-textarea::placeholder {
    color: #888;
}

.chat-submit {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 16px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}

.chat-submit:hover {
    background-color: #0056b3;
    transform: scale(1.05); /* Efeito de destaque ao passar o mouse */
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
        class="form-control chat-textarea" 
        placeholder="Digite sua mensagem..." 
        id="chat-textarea" 
        rows="1" 
        oninput="handleInput(this)">
    </textarea>
    <div class="me-3"></div>
    <button class="btn btn-primary" type="submit">Enviar</button>
</div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    function handleInput(textarea) {
    const maxWords = 50; // Limite de palavras
    const words = textarea.value.split(/\s+/); // Divide o texto em palavras usando espaços

    if (words.length > maxWords) {
        // Mantém apenas as primeiras palavras dentro do limite
        textarea.value = words.slice(0, maxWords).join(" ");
    }

    textarea.style.height = "auto"; // Reseta altura para recalcular
    textarea.style.height = Math.min(textarea.scrollHeight, 100) + "px"; // Ajusta até 4 linhas
}
</script>

<?php include "footer.php" ?>