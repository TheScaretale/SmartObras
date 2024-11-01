<?php include "navbar.php" ?>

<style>
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

    /* Estilos para o chat */
    .chat-container {
        max-height: 70vh;
        overflow-y: auto;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
        flex: 1;
    }

    .chat-message {
        margin-bottom: 10px;
        max-width: 80%;
    }

    .chat-message p {
        margin: 0;
        padding: 10px;
        border-radius: 8px;
    }

    .message-sent {
        background-color: #d1e7dd;
        text-align: right;
        align-self: flex-end;
    }

    .message-received {
        background-color: #e9ecef;
        align-self: flex-start;
    }

    .chat-input {
        border-top: 1px solid #dee2e6;
        padding: 10px;
    }

    /* Ajuste para campo de input e botão no mobile */
    .chat-input .input-group {
        flex-wrap: nowrap;
    }

    .chat-input input {
        flex: 1;
    }

    /* Ajustes de responsividade */
    @media (max-width: 576px) {
        /* A lista de mensagens recentes se torna uma barra horizontal no topo */
        .recent-messages-bar {
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
            background-color: #f8f9fa;
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }

        .recent-message-item {
            flex: 0 0 auto;
            padding: 0 10px;
            text-align: center;
        }

        /* Esconde a coluna lateral original no mobile */
        .col-md-3 {
            display: none;
        }

        .col {
            flex: 1; /* Expande o chat para ocupar a tela toda no mobile */
        }

        .chat-container {
            max-height: calc(100vh - 160px); /* Ajusta a altura do chat para preencher a tela */
        }
    }
    /* Barra de mensagens recentes no topo */
.recent-messages-bar {
    display: none; /* Esconde no desktop */
}

@media (max-width: 576px) {
    /* Exibe a barra de mensagens recentes no topo no mobile */
    .recent-messages-bar {
        display: flex;
        overflow-x: auto;
        white-space: nowrap;
        background-color: #f8f9fa;
        padding: 10px;
        border-bottom: 1px solid #dee2e6;
        width: 100%;
    }

    .recent-message-item {
        flex: 0 0 auto;
        padding: 0 10px;
        text-align: center;
    }

    /* Esconde a coluna lateral e ajusta o chat para ocupar toda a tela */
    .col-md-3 {
        display: none;
    }

    .col {
        flex: 1;
        max-width: 100%;
    }

    .chat-container {
        max-height: calc(100vh - 160px);
    }
}

</style>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <!-- Sidebar (Desktop) -->
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light text-black min-vh-100 d-none d-md-block">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-black min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Mensagens</span>
                </a>
                
                <!-- List Group de mensagens recentes -->
                <div class="list-group w-100" id="jobsTable">
                    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <h6 class="mb-0">User1</h6>
                                <p class="mb-0 opacity-75">Mensagem recente...</p>
                            </div>
                            <small class="opacity-50 text-nowrap">2m</small>
                        </div>
                    </a>
                    <!-- Outras mensagens recentes podem ser adicionadas aqui -->
                </div>
            </div>
        </div>

        <!-- Barra de mensagens recentes (Mobile) -->
<div class="recent-messages-bar d-md-none">
    <div class="recent-message-item">
        <img src="https://github.com/twbs.png" alt="User1" width="32" height="32" class="rounded-circle">
        <div><small>User1</small></div>
    </div>
    <!-- Outros itens de mensagem podem ser adicionados aqui -->
</div>

        <!-- Chat principal -->
        <div class="col py-3 d-flex flex-column" id="janelaChat">
            <h4>Chat</h4>
            <div class="chat-container d-flex flex-column">
                <!-- Mensagens do chat -->
                <div class="chat-message message-received">
                    <p><strong>User1:</strong> Olá! Tudo bem?</p>
                </div>
                <div class="chat-message message-sent">
                    <p><strong>Você:</strong> Oi! Tudo bem, e com você?</p>
                </div>
                <div class="chat-message message-received">
                    <p><strong>User1:</strong> Estou bem também. Vamos começar o projeto?</p>
                </div>
                <!-- Outras mensagens podem ser inseridas aqui -->
            </div>

            <!-- Input de nova mensagem -->
            <div class="chat-input">
                <form id="chatForm">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Digite uma mensagem..." id="chatMessageInput">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>

<script>
    document.getElementById('chatForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Captura a mensagem do input
        const messageInput = document.getElementById('chatMessageInput');
        const messageText = messageInput.value.trim();
        
        // Verifica se a mensagem não está vazia
        if (messageText) {
            // Cria o elemento de mensagem
            const newMessage = document.createElement('div');
            newMessage.classList.add('chat-message', 'message-sent');
            newMessage.innerHTML = `<p><strong>Você:</strong> ${messageText}</p>`;
            
            // Adiciona a nova mensagem ao chat
            document.querySelector('.chat-container').appendChild(newMessage);
            
            // Limpa o campo de entrada
            messageInput.value = '';
            
            // Scroll para a última mensagem
            document.querySelector('.chat-container').scrollTop = document.querySelector('.chat-container').scrollHeight;
        }
    });
</script>
