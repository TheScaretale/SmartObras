 <!-- NavBar -->
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
                     <div class="d-flex justify-content-between align-items-center">
                         <div class="ratings" style="margin-left: 2.5rem;">
                             <i class="fa fa-star checked" style="font-size: 24px;"></i>
                             <i class="fa fa-star checked" style="font-size: 24px;"></i>
                             <i class="fa fa-star" style="font-size: 24px;"></i>
                             <i class="fa fa-star" style="font-size: 24px;"></i>
                             <i class="fa fa-star" style="font-size: 24px;">(10)</i>
                         </div>
                     </div>
                 </div>
                 <hr>
                 <div class="profissao">
                     <h4>Azulejista e Hidraulica</h4>
                 </div>
             </div>

             <div class="col-1"></div>

             <div class="col-sm-3 col-lg-3 mt-3 ms-lg-4">
                 <?php if ($_SESSION["userType"] == "P") { ?>
                     <h5 class="bold card-title">Atividades</h5>
                     <p><span>Projetos realizados</span><strong class="pull-right">0</strong></p>
                     <p><span>Projetos em Execução</span><strong class="pull-right">0</strong></p>
                 <?php } else { ?>
                     <h5 class="bold card-title">Meus Projetos</h5>
                     <p><span>Projetos em aberto</span><strong class="pull-right">0</strong></p>
                     <p><span>Projetos em Andamento</span><strong class="pull-right">0</strong></p>
                     <p><span>Projetos em Concluidos</span><strong class="pull-right">0</strong></p>
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

 <!-- Projetos Realizados -->
<div class="card mt-3">
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#ProjetosRealizados" role="button" aria-expanded="false" aria-controls="ProjetosRealizados">
            Projetos Realizados
        </a>
        <div class="collapse" id="ProjetosRealizados">
            <div class="card card-body" id="ProjetosRealizadosContent" contentEditable="false">
                <!-- Conteúdo inicial de exemplo -->
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias sint, error enim iusto nemo quos facere sequi eos voluptatibus officiis tempore quo vitae dolore numquam ipsam, qui iste? Delectus, nobis.
            </div>
        </div>
    </div>
</div>

<!-- Sobre Mim -->
<div class="card mt-3">
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#SobreMim" role="button" aria-expanded="false" aria-controls="SobreMim">
            Sobre mim
        </a>
        <div class="collapse" id="SobreMim">
            <div class="card card-body" id="SobreMimContent" contentEditable="false">
                <!-- Conteúdo inicial de exemplo -->
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </div>
        </div>
    </div>
</div>  

<!-- Histórico Profissional -->
<div class="card mt-3">
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#HistoricoProfissional" role="button" aria-expanded="false" aria-controls="HistoricoProfissional">
            Histórico Profissional
        </a>
        <div class="collapse" id="HistoricoProfissional">
            <div class="card card-body" id="HistoricoProfissionalContent" contentEditable="false">
                <!-- Conteúdo inicial de exemplo -->
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias sint, error enim iusto nemo quos facere sequi eos voluptatibus officiis tempore quo vitae dolore numquam ipsam, qui iste? Delectus, nobis.
            </div>
        </div>
    </div>
</div>


 <?php
    include "footer.php";
    ?>