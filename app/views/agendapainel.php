<?php 
//acessos
$user_inserir = $_SESSION[SESSION_LOGIN]->inserir;
$user_excluir = $_SESSION[SESSION_LOGIN]->excluir;
$user_editar = $_SESSION[SESSION_LOGIN]->editar;
$user_instrutor = $_SESSION[SESSION_LOGIN]->instrutor;
$user_usuario = $_SESSION[SESSION_LOGIN]->id_usuario;

?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo URL_BASE ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo URL_BASE ?>assets/images/favicon.png" type="image/x-icon">
    <title>RentalSys - Administração</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/feather-icon.css">
    <!-- Plugins css start-->
     <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/select2.css">
     <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/dropzone.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/owlcarousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/rating.css">
    <!-- Plugins css Ends-->
    <!-- Plugins css start-->

    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/prism.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/vector-map.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/responsive.css">
    
     <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/summernote.css">
    <!-- Plugins css Ends-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/js/full/main.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/jkanban.css">
    <script>
	var base_url = "<?php echo URL_BASE ?>";
	</script>
  </head>
  <body>
    <?php //include_once 'bolinha.php';?>
    <!-- page-wrapper Start       -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
		<?php //include_once 'cabecalho.php';?>
		
		
		<div class="page-main-header" >
        <div class="main-header-right row m-0">
          <div class="main-header-left">
            <div class="logo-wrapper"><a href="<?php echo URL_BASE ?>"><img class="img-fluid" src="<?php echo URL_BASE ?>assets/images/logo/logo.png" alt=""></a></div>
            <div class="dark-logo-wrapper"><a href="<?php echo URL_BASE ?>"><img class="img-fluid" src="<?php echo URL_BASE ?>assets/images/logo/dark-logo.png" alt=""></a></div>
          </div>
          <div class="left-menu-header col">
            <ul>
              <li>
                <form class="form-inline search-form">
                  <div class="search-bg">
                    <h3>Agenda da Sala de Treinamento</h3>
                  </div>
                </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
              </li>
            </ul>
          </div>
          <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
              <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="onhover-dropdown">
                <div class="bookmark-box"><i data-feather="star"></i></div>
                <div class="bookmark-dropdown onhover-show-div">
                  <div class="form-group mb-0">
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
                      <input class="form-control" type="text" placeholder="Pesquisar marcador...">
                    </div>
                  </div>
                  
                </div>
              </li>
              <li class="onhover-dropdown">
                <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span></div>
              </li>
              
              </li>
            </ul>
          </div>
          <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
      </div>
		
		
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <?php include_once 'lateral.php';?>
        <?php $this->load($view, $viewData) ?>
        <?php //include_once 'rodape.php' ?>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="<?php echo URL_BASE ?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?php echo URL_BASE ?>assets/js/sidebar-menu.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo URL_BASE ?>assets/js/bootstrap/popper.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo URL_BASE ?>assets/js/chart/chartist/chartist.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/chart/knob/knob.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/chart/knob/knob-chart.js"></script>
    
    <script src="<?php echo URL_BASE ?>assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/prism/prism.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/clipboard/clipboard.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/counter/jquery.waypoints.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/counter/jquery.counterup.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/counter/counter-custom.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/custom-card/custom-card.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/dashboard/default.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/notify/index.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/rating/jquery.barrating.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/rating/rating-script.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/owlcarousel/owl.carousel.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/ecommerce.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/product-list-custom.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/js.js"></script>
     <script src="<?php echo URL_BASE ?>assets/js/editor/ckeditor/ckeditor.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/editor/ckeditor/adapters/jquery.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/dropzone/dropzone.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/dropzone/dropzone-script.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/email-app.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo URL_BASE ?>assets/js/script.js"></script>

    <!-- Plugins JS start-->
    <script src="<?php echo URL_BASE ?>assets/js/jquery.ui.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/editor/summernote/summernote.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/editor/summernote/summernote.custom.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/tooltip-init.js"></script>
 
    <!-- Bootstrap js-->
    <script src="<?php echo URL_BASE ?>assets/js/bootstrap/popper.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo URL_BASE ?>assets/js/select2/select2.full.min.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/select2/select2-custom.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/email-app.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/form-validation-custom.js"></script>
 <!-- Plugins JS start-->
    <script src="<?php echo URL_BASE ?>assets/js/editor/ckeditor/styles.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/editor/ckeditor/ckeditor.custom.js"></script>
	<script src="<?php echo URL_BASE ?>assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/chart/apex-chart/chart-custom.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Plugins JS start-->
    <script src="<?php echo URL_BASE ?>assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/popover-custom.js"></script>
    <script src="<?php echo URL_BASE ?>assets/js/jquery.mask.js"></script>	
		<script src="<?php echo URL_BASE ?>assets/js/componentes/js_mascara.js"></script>
    
  </body>
</html>