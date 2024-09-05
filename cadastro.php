<?php
include "navbar.php";
?>
<div class="d-flex justify-content-center align-items-center">
    <form action="">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Endereço de email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nunca iremos compartilhar essa informação com alguém.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Confirme a senha</label>
            <input type="password" class="form-control" id="password2">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone: </label>
            <input type="text" class="form-control" id="telefone">
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">O que você busca no SmartObras?</label>
            <select name="tipo" id="tipo" class="form-select">
                <option value="P">Buscando trabalho</option>
                <option value="U">Buscando profissionais</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" id="btnCadastrar">Cadastrar</button>
        <a href="index.php" class="btn btn-primary">Voltar</a>
    </form>
</div>
<?php
include "footer.php";
?>