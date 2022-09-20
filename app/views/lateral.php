<?php 
$connet = mysqli_connect("localhost","rentalsys","@#alex2021","rentalsys");
$sqlint = "SELECT versao,data FROM updates ORDER BY data DESC";
$sqlint = mysqli_query($connet, $sqlint);
$cur_idv = mysqli_fetch_assoc($sqlint);

$versao =  $cur_idv['versao'];
$dversao = date('d/m/Y', strtotime($cur_idv['data']));
?>


<!-- Page Sidebar Start-->
        <header class="main-nav">
          <div class="sidebar-user text-center"><img class="img-90 rounded-circle" src="<?php echo URL_BASE ?>assets/images/dashboard/<?php echo $_SESSION[SESSION_LOGIN]->imagem; ?>" alt="">
            <div class="badge-bottom"><span class="badge badge-primary"></span></div><a href="#">
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
                  
                  <?php if($_SESSION[SESSION_LOGIN]->vendas){ ?>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Financeiro</h6>
                    </div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Compras</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="<?php echo URL_BASE . "financeiro/lista_faturar_ordem_compra"?>">Ordem de Compra</a></li>
                      <li><a href="<?php echo URL_BASE . "fornecedor"?>">Fornecedores</a></li>
                    </ul>
                  </li>
                  
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Vendas</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="<?php echo URL_BASE . "financeiro/lista_faturar_pedido"?>">Pedidos</a></li>
                      <li><a href="<?php echo URL_BASE . "pipeline"?>">PipeLine</a></li>
                    </ul>
                  </li>
                  
                   <?php } else {}?>
                  
                  
                  <?php if($_SESSION[SESSION_LOGIN]->vendas){ ?>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Vendas</h6>
                    </div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Vendas</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="<?php echo URL_BASE . "orcamento"?>">Orçamentos</a></li>
                      <li><a href="<?php echo URL_BASE . "Pedido"?>">Pedidos</a></li>
                      <li><a href="<?php echo URL_BASE . "pipeline"?>">PipeLine</a></li>
                      <li><a href="<?php echo URL_BASE . "financeiro/lista_pedido_faturado"?>">Emitir NFE</a></li>
                      
                    </ul>
                  </li>
                  
                   <?php } else {}?>
                  
                  <?php if($_SESSION[SESSION_LOGIN]->compras){ ?>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Compras</h6>
                    </div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Compras</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="<?php echo URL_BASE . "solicitacao"?>">Solicitação</a></li>
                      <li><a href="<?php echo URL_BASE . "cotacao"?>">Cotação</a></li>
                      <li><a href="<?php echo URL_BASE . "ordemcompra"?>">Ordem de Compra</a></li>
                      <li><a href="<?php echo URL_BASE . "fornecedor"?>">Fornecedores</a></li>
                    </ul>
                  </li>
                  
                   <?php } else {}?>
                   
                   
                  
                  <?php if($_SESSION[SESSION_LOGIN]->posvenda == 's'){ ?>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Pós Vendas             </h6>
                    </div>
                  </li>
                  <?php if($_SESSION[SESSION_LOGIN]->chamado == 's'){ ?>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Chamados</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="<?php echo URL_BASE . "chamado"?>">Chamados</a></li>
                      <li><a href="<?php echo URL_BASE . "chamado/create"?>">Abrir Chamado</a></li>
                    </ul>
                  </li>
                  <?php } else {}?>
                   <?php if($_SESSION[SESSION_LOGIN]->treinamento == 's'){ ?>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Treinamentos</span></a>
                    <ul class="nav-submenu menu-content"> 
                    <?php if($_SESSION[SESSION_LOGIN]->geral){ ?>
                    <li><a href="<?php echo URL_BASE . "feriado"?>">Feriados</a></li>  
                     <?php } else {}?>
                      <li><a href="<?php echo URL_BASE . "agenda"?>">Agenda Sala</a></li>                     
                      <?php if($_SESSION[SESSION_LOGIN]->aprofessor){ ?>
                      <li><a href="<?php echo URL_BASE . "professor"?>">Agenda Professor</a></li>  
                      <li><a href="<?php echo URL_BASE . "clientecursos"?>">Clientes</a></li>  
                      <?php } else {}?>
                    </ul>
                  </li>
                  <?php } else {}?>
                  <?php } else {}?>
                  
                   <?php if($_SESSION[SESSION_LOGIN]->estoque){ ?>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Estoque</h6>
                    </div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Movimentação</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="<?php echo URL_BASE . "TipoMovimento"?>">Tipos de Movimento</a></li>
                      <li><a href="<?php echo URL_BASE . "Localizacao"?>">Localização</a></li>
                      <li><a href="<?php echo URL_BASE . "ProdutoLocalizacao"?>">Produto Localização</a></li>
                      <li><a href="<?php echo URL_BASE . "entrada"?>">Entrada Avulsa</a></li>
                      <li><a href="<?php echo URL_BASE . "saida"?>">Saída Avulsa</a></li>
                      <li><a href="<?php echo URL_BASE . "transferencia"?>">Transferência</a></li>
                      <li><a href="<?php echo URL_BASE . "movimento"?>">Ficha Razão</a></li>
                    </ul>
                  </li>
                  
                   <?php } else {}?>
                   
                   
                   
                   <?php if($_SESSION[SESSION_LOGIN]->geral){ ?>
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
                      <li><a href="<?php echo URL_BASE . "produto/create"?>">Cadastro de Produto</a></li>
                      <li><a href="<?php echo URL_BASE . "produtolocalizacao"?>">Produto Localização</a></li>
                      <li><a href="<?php echo URL_BASE . "categoria"?>">Categoria</a></li>
                      <li><a href="<?php echo URL_BASE . "marca"?>">Marca</a></li>
                      <li><a href="<?php echo URL_BASE . "unidade"?>">Unidade</a></li>
                    </ul>
                  </li>
                   <?php } else {}?>
               </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
        <!-- Page Sidebar Ends-->