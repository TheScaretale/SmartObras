<?php include "navbar.php"; ?>

<div class="my-3"></div> 

<div class="container">
  <div class="d-flex flex-column align-items-stretch bg-body-tertiary w-100">
    <!-- Cabeçalho de Mensagens -->
    <a class="d-flex align-items-center p-3 link-body-emphasis text-decoration-none border-bottom">
      <svg class="bi pe-none me-2" width="30" height="24">
        <use xlink:href="#bootstrap" />
      </svg>
      <span class="fs-5 fw-semibold">Mensagens</span>
    </a>

    <!-- List Group com mensagens -->
    <div class="list-group">
      <a href="chat2.php" class="list-group-item list-group-item-action d-flex gap-3 py-3" id="" aria-current="true">
        <img id="ft_perfil"  src="https://github.com/twbs.png" alt="twbs" width="40" height="40" class="rounded-circle flex-shrink-0">
        <div class="d-flex gap-2 w-100 justify-content-between" style="height: 70px;">
          <div>
            <h6 id="msg_nome" class="mb-0">List group item heading</h6>
            <p id="previacnvs" class="mb-0 opacity-75" style="margin-top: 30px;">assunto...</p>
          </div>
          <small id="data_msg" class="opacity-50 text-nowrap">now</small>
        </div>
      </a>

      <a href="chat2.php" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <img id="ft_perfil" src="https://github.com/twbs.png" alt="twbs" width="40" height="40" class="rounded-circle flex-shrink-0">
        <div class="d-flex gap-2 w-100 justify-content-between" style="height: 70px;">
          <div>
            <h6 id="msg_nome" class="mb-0">List group item heading</h6>
            <p id="previacnvs" class="mb-0 opacity-75" style="margin-top: 30px;">assunto...</p>
          </div>
          <small id="data_msg" class="opacity-50 text-nowrap">now</small>
        </div>
      </a>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>
