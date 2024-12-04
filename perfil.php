 <?php
    include "navbar.php";
?>

 <div class="card  mt-3">
     <div class="card-body">
         <div class="row" id="containerPerfil">
             <div class="col-md-5 col-lg-3 text-center">
                 <div id="section-logo">
                     <img src="data:image/png;base64" alt="" class="fotoPerfil">
                     <input type="file" name="foto" id="fotoInput" hidden="">
                     <label for="fotoInput" id="btnFoto" class="btn btn-primary mt-3" hidden="">Selecionar foto</label>
                 </div>
                 <div class="">
                     <div style="margin-top: 15px;">
                         <h2 id="nomePerfil"></h2>
                     </div>
                     
                 </div>
                 
             </div>

             <div class="col-1"></div>

             <div class="col-sm-3 col-lg-3 mt-3 ms-lg-4">
                 <?php if ($_SESSION["userType"] == "P") { ?>
                     <h5 class="bold card-title">Atividades</h5>
                     <p><span>Total projetos: </span><strong class="pull-right" id="totalProjetos"></strong></p>
                 <?php } else { ?>
                     <h5 class="bold card-title">Meus Projetos</h5>
                     <p><span>Total projetos: </span><strong class="pull-right" id="totalProjetos"></strong></p>
                 <?php } ?>
             </div>


             <div class="col-sm-3 col-lg-3 mt-3 ms-lg-5">
                 <?php if ($_SESSION["userType"] == "P") { ?>
                     <h5 class="bold card-title">Informações</h5>
                     <p>Email: <span id="emailPerfil"></span></p>
                     <p>Telefone <span id="telefonePerfil"></span></p>

                 <?php } else { ?>
                     <h5 class="bold card-title">Informações</h5>
                     <p>Email: <span id="emailPerfil"></span></p>
                     <p>Telefone: <span id="telefonePerfil"></span></p>

                 <?php } ?>
             </div>

             <div id="profileBtns" style="display: flex; justify-content: flex-end;">
                 <button type="button" class="btn btn-warning" id="btnReturn" hidden>
                     Voltar
                 </button>
                 <div class="me-2"></div>
                 <btn onclick="profileEditMode()" id="btnEditPerfil" class="btn btn-warning">
                     Editar Perfil
                 </btn>
             </div>
         </div>
     </div>
 </div>
<div class="card mt-3">
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#ProjetosRealizados" role="button" aria-expanded="false" aria-controls="ProjetosRealizados">
            Projetos Realizados
        </a>
        <div class="collapse" id="ProjetosRealizados">
        <div class="mb-3"></div>
        <?php if ($_SESSION["userType"] == "P") { ?>
            <div id="profileJobs"></div>
        <?php } else { ?>
            <div id="profileJobsCliente"></div>
        <?php } ?>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#SobreMim" role="button" aria-expanded="false" aria-controls="SobreMim">
            Sobre mim
        </a>
        <div class="collapse" id="SobreMim">
            <div class="mb-3"></div>
            <div class="card card-body" contentEditable="false">
                <span id="sobreMimContent">
                    
                </span>
            </div>
        </div>
    </div>
</div>  

<?php
    include "footer.php";
?>