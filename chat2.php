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
</style>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-5 col-xl-4 px-sm-4 px-2 bg-light text-black min-vh-80">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-black min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Mensagens</span>
                </a>

                <!-- List Group de mensagens recentes -->
                <div class="list-group" id="jobsTable">
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

        <div class="col py-3" id="janelaChat">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title"> Nome do usuario </h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card mb-3 align-self-start">
                                <div class="card-body">
                                    <p id="mensagemDestinatario">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis minima veniam quo voluptate omnis ut officia repudiandae minus possimus ducimus, optio expedita consequatur excepturi iusto quos porro nihil, cum officiis? Architecto illo ad inventore reiciendis, eveniet aliquam ea voluptates quidem fugit perspiciatis praesentium quas velit quis asperiores adipisci laborum est!</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-5 offset-md-7">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p id="mensagemRemetente">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia soluta repellat ipsam optio dolores? Blanditiis ad aspernatur ratione error libero. Perferendis obcaecati in ipsam quos. At velit amet illum cumque.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="input-group">
                        <textarea class="form-control" placeholder="Digite sua mensagem..." id="auto-resize" rows="1" oninput="autoResize(this)"></textarea>
                        <button class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "footer.php" ?>