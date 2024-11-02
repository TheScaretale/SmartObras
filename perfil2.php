 <!-- NavBar -->
 <?php
    include "navbar.php";
    ?>

 <div class="card  mt-3">
     <div class="card-body">
         <div class="row">
             <div class="col-md-5 col-lg-3 text-center">
                 <div id="section-logo">
                     <svg xmlns="http://www.w3.org/2000/svg" width="220" height="220" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                         <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                         <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                     </svg>
                 </div>
                 <div class="">
                     <?php
                        $user = $_SESSION["user"];
                        $nomeSobrenome = explode(" ", $user);
                        $nome = $nomeSobrenome[0];
                        $sobrenome = isset($nomeSobrenome[1]) ? $nomeSobrenome[1] : '';
                        ?>
                     <div style="margin-top: 15px;">
                         <p class="card-title" style="font-size: 40px; font-weight: bold; margin: 0;">
                             <?php echo $nome; ?> <?php echo $sobrenome; ?>
                         </p>
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
                     <p>Email:<span id="emailPerfil"></span></p>
                     <p>Telefone<span id="telefonePerfil"></span></p>
                     <p>Foto<span id="fotoPerfil"></span></p>
                 <?php } else { ?>
                     <h5 class="bold card-title">Informações</h5>
                     <p><span>Não sei o que colocar</span><strong class="pull-right">0</strong></p>
                     <p><span>why?</span><strong class="pull-right">0</strong></p>
                     <p><span>Último login</span><strong class="pull-right">0</strong></p>
                     <p><span>Ingressou</span><strong class="pull-right">há 0</strong></p>
                 <?php } ?>
             </div>

             <div style="display: flex; justify-content: flex-end;">
             <div style="display: flex; justify-content: flex-end;">
    <a href="editar_perfil.php" class="btn" style="width: 150px; height: 35px; font-size: 15px;">Editar Perfil</a>
</div>
             </div>
         </div>
     </div>
 </div>
 <div class="card mt-3">
     <div class="card-body">
         <p class="d-inline-flex gap-1">
             <a class="btn btn-primary" data-bs-toggle="collapse" href="#ProjetosRealizados" role="button" aria-expanded="false" aria-controls="ProjetosRealizados">
                 Projetos Realizados
             </a>
         </p>
         <div class="collapse" id="ProjetosRealizados">
             <div class="card card-body">
                 <p class="mb-4">
                     Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias sint, error enim iusto nemo quos facere sequi eos voluptatibus officiis tempore quo vitae dolore numquam ipsam, qui iste? Delectus, nobis.
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos vel repellat architecto minus dolorum, quaerat molestiae, facere hic alias ut quam mollitia nam repudiandae reiciendis atque dignissimos dolor laboriosam placeat.
                 </p>

                 <div class="d-none d-md-flex justify-content-around">
                     <img src="https://www.liuazulejista.com.br/299221/" class="rounded" style="width: 300px; height: 300px" alt="...">
                     <img src="https://blog.inovesuaobra.com.br/wp-content/uploads/2020/11/79fa1-azulejista-968067.jpg" class="rounded" style="width: 300px; height: 300px" alt="...">
                     <img src="assets/gih2.jpeg" class="rounded" style="width: 300px; height: 300px" alt="...">
                 </div>

                 <div id="carouselExampleControls" class="carousel slide d-md-none" data-bs-ride="carousel">
                     <div class="carousel-inner">
                         <div class="carousel-item active">
                             <img src="https://www.liuazulejista.com.br/299221/" class="d-block w-100" style="height: 300px" alt="...">
                         </div>
                         <div class="carousel-item">
                             <img src="https://blog.inovesuaobra.com.br/wp-content/uploads/2020/11/79fa1-azulejista-968067.jpg" class="d-block w-100" style="height: 300px" alt="...">
                         </div>
                         <div class="carousel-item">
                             <img src="assets/gih2.jpeg" class="d-block w-100" style="height: 300px" alt="...">
                         </div>
                     </div>
                     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="visually-hidden">Previous</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                         <span class="visually-hidden">Next</span>
                     </button>
                 </div>
             </div>
         </div>

     </div>
 </div>
 <div class="card mt-3">
     <div class="card-body">
         <p class="d-inline-flex gap-1">
             <a class="btn btn-primary" data-bs-toggle="collapse" href="#SobreMim" role="button" aria-expanded="false" aria-controls="SobreMim">
                 Sobre mim
             </a>
         </p>
         <div class="collapse" id="SobreMim">
             <div class="card card-body">
                 Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias sint, error enim iusto nemo quos facere sequi eos voluptatibus officiis tempore quo vitae dolore numquam ipsam, qui iste? Delectus, nobis.
             </div>
         </div>
     </div>
 </div>

 <div class="card mt-3">
     <div class="card-body">
         <p class="d-inline-flex gap-1">
             <a class="btn btn-primary" data-bs-toggle="collapse" href="#HistoricoProfissional" role="button" aria-expanded="false" aria-controls="HistoricoProfissional">
                 Historico Profissional
             </a>
         </p>
         <div class="collapse" id="HistoricoProfissional">
             <div class="card card-body">
                 Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias sint, error enim iusto nemo quos facere sequi eos voluptatibus officiis tempore quo vitae dolore numquam ipsam, qui iste? Delectus, nobis.
             </div>
         </div>
     </div>
 </div>

 <?php
    include "footer.php";
    ?>