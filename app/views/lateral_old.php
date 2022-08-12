<?php 
$connet = mysqli_connect("localhost","rentalsys","@#alex2021","rentalsys");
$sqlint = "SELECT * FROM updates ORDER BY data DESC";
$sqlint = mysqli_query($connet, $sqlint);
$cur_idv = mysqli_fetch_assoc($sqlint);

$versao =  $cur_idv['versao'];
$dversao = date('d/m/Y', strtotime($cur_idv['data']));
?><!-- Page Sidebar Start-->
        <header class="main-nav">
          <div class="sidebar-user text-center"><img class="img-90 rounded-circle" src="<?php echo URL_BASE ?>assets/images/dashboard/<?php echo $_SESSION[SESSION_LOGIN]->imagem; ?>" alt="">
            <div class="badge-bottom"><span class="badge badge-primary"></span></div><a href="user-profile.html">
              <h6 class="mt-3 f-14 f-w-600"><?php echo $_SESSION[SESSION_LOGIN]->nome_usuario; ?></h6></a>
            <p class="mb-0 font-roboto"><?php echo $_SESSION[SESSION_LOGIN]->cargo; ?></p>
            <ul>
              <li><span><?php echo $versao; ?></span>
                <p>Versão</p>
              </li>
            </ul>
          </div>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">           
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Pós Vendas             </h6>
                    </div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Chamados</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="<?php echo URL_BASE . "chamado"?>">Chamados</a></li>
                      <li><a href="<?php echo URL_BASE . "chamado/create"?>">Abrir Chamado</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Treinamentos</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="<?php echo URL_BASE . "treinamento"?>">Agenda Sala</a></li>  
                      <li><a href="<?php echo URL_BASE . "professor"?>">Agenda Professor</a></li>  
                    </ul>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Geral             </h6>
                    </div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Clientes</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="<?php echo URL_BASE . "cliente"?>">Lista Clientes</a></li>
                      <li><a href="<?php echo URL_BASE . "cliente/create"?>">Cadastro</a></li>
                    </ul>
                  </li>
                   <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Produtos</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="<?php echo URL_BASE . "produto"?>">Lista Produtos</a></li>
                      <li><a href="<?php echo URL_BASE . "produto/create"?>">Cadastro</a></li>
                    </ul>
                  </li>
               </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
        <!-- Page Sidebar Ends-->