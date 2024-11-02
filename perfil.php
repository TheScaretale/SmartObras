 <!-- NavBar -->
 <?php
    include "navbar.php";
    ?>

 <div class="container mt-5" id="jobDetails">
     <div class="row">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-sm-4 col-md-5 col-lg-3 text-center">
                             <div id="section-logo">
                                 <div class="profile-photo img img-circle img-landscape"><img src="https://wkncdn.com/newx/assets/build/img/logos/default_logo_1-normal.c4ce6a3dc.jpg" itemprop="photo" width="200" alt="Freelancer Giovanna da Rosa Novo" title="Giovanna da Rosa Novo" loading="lazy" height="192"> <a class="edit-btn">Editar foto</a></div>
                             </div>
                             <div class="badges">
                                 <div class="clearfix"></div>
                                 <div class="row">
                                     <div class="col-md-12 medals">
                                         <div data-toggle="tooltip" title="" class=" profile-badge profile-badge-normal iron" data-original-title="Freelancer iron"></div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-sm-6">
                             <h3 class="card-title"></h3>
                             <hr>
                             <h5 class="card-title">Azulejista e Hidraulica</h5>
                             <div class="d-flex justify-content-between align-items-center">
                                 <div class="ratings">
                                     <i class="fa fa-star checked"></i>
                                     <i class="fa fa-star checked"></i>
                                     <i class="fa fa-star "></i>
                                     <i class="fa fa-star "></i>
                                     <i class="fa fa-star"> (10)</i>
                                 </div>
                                 <div class="text-end">
                                     <h5 class="review-count m-1">Projetos</h5>
                                     <p class="m-0">32</p>
                                 </div>
                             </div>
                             <h5 class="card-title">Freelancer experiente em Azulejista, Hidraulica</h5>

                             <h5 class="card-title">Selecione no maximo 1 Habilidade</h5>
                             <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="" id="flexAzulejista">
                                 <label class="form-check-label" for="flexAzulejista">
                                     Azulejista
                                 </label>
                             </div>
                             <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="" id="flexEletricista" checked>
                                 <label class="form-check-label" for="flexEletricista">
                                     Eletricista
                                 </label>
                             </div>
                             <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="" id="flexHidráulica" checked>
                                 <label class="form-check-label" for="flexHidráulica">
                                     Hidráulica
                                 </label>
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
                             Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias sint, error enim iusto nemo quos facere sequi eos voluptatibus officiis tempore quo vitae dolore numquam ipsam, qui iste? Delectus, nobis.
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
         </div>
         <br>
         <div class="col-md-4">
             <div class="card">
                 <div class="card-body">
                     <h5>
                         <p class="bold card-title">Atividades</p>
                     </h5>
                     <p><span>Projetos realizados</span><strong class="pull-right">0</strong></p>
                     <p><span>Projetos em Execução</span><strong class="pull-right">0</strong></p>
                     <p><span>Horas Trabalhadas</span><strong class="pull-right">0</strong></p>
                     <hr>
                     <h5>
                         <p class="bold card-title">Informações</p>
                     </h5>
                     <p><span>Classificações dos clientes</span><strong class="pull-right">0</strong></p>
                     <p><span>Certificações</span><strong class="pull-right">0</strong></p>
                     <p><span>Último login</span><strong class="pull-right">0</strong></p>
                     <p><span>Ingressou</span><strong class="pull-right"></strong></p>
                     <div class="d-flex justify-content-between align-items-center mt-3"></div>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <?php
    include "footer.php";
    ?>