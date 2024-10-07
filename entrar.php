<?php include "navbar.php"; ?>
<div class="d-flex justify-content-center  align-items-center">
  <div class="card">
    <form id="loginForm">
      <div class="card-body text-center">
        <div class="mb-3">
          <label for="email" class="form-label">Endereço de email</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Nunca iremos compartilhar essa informação com alguém.</div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Senha</label>
          <input type="password" class="form-control" id="password">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="checkRemember">
          <div class="form-text" id="emailHelp"><a href="esquecisenha.php">Esqueceu a senha?</a></div>
          <label class="form-check-label" for="checkRemember">Lembre-me</label>
        </div>
        <button type="submit" class="botaoo" id="btnEntrar" onclick="">Entrar</button>
      </div>
  </div>
  </form>
</div>
<?php include "footer.php"; ?>