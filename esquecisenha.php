<?php include "navbar.php"; ?>
<h1>Recuperar sua senha:</h1>
<form action="" id="forgotPass">
    <div class="mb-3">
        <label for="email" class="form-label">Endereço de email</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Nunca iremos compartilhar essa informação com alguém.</div>
    </div>
    <button type="submit" class="btn btn-primary" id="btnRecuperar" onclick="forgotPass()">Recuperar</button>
</form>
<?php include "footer.php"; ?>