<meta http-equiv="refresh" content="1200;url=#">
<div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid dashboard-default-sec">
            <div class="row">
              <div class="col-xl-5 box-col-12 des-xl-100"> 
                <div class="row">
                  <div class="col-xl-12 col-md-6 box-col-6 des-xl-50">
                    <div class="card profile-greeting">
                      <div class="card-header">
                        <div class="header-top">
                          
                        </div>
                      </div>
                      <div class="card-body text-center p-t-0">
                        <h3 class="font-light">Bem Vindo de volta, <?php echo $_SESSION[SESSION_LOGIN]->nome_usuario; ?>!!</h3>
                        <p>Bem-vindo à Família RentalSys! estamos felizes que você esteja visitando este painel. teremos o maior prazer em ajudá-lo a crescer o seu negócio.</p>
                        <button class="btn btn-light">Atualizar Perfil</button>
                      </div>
                      
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">                                 
                      <div class="card-body text-center">                                  
                        <div class="round-box">
                          <i data-feather="user-check"> </i>
                        </div>
                        <h5>COMPARECEU</h5>
                        <?php 
                        foreach($concluidos as $ab) {}
                        foreach($eventos as $abt) {}
                        foreach($listaabertos as $aba) {}
                        echo $ab->so;
                        ?>
                        <p>Total de Eventos <?php echo $abt->so; ?> </p><a class="btn-arrow arrow-primary" href="javascript:void(0)"><?php echo number_format(($ab->so*100/$abt->so),1,",","."); ?>% </a>
                        <div class="parrten">

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">                                    
                      <div class="card-body text-center">
                        <div class="round-box">
                         
                         <i data-feather="user-x"></i>
                                </div>
                        <h5>NÃO COMPARECEU</h5>
                        <?php 
                        foreach($concluidos as $ab) {}
                        foreach($eventos as $abt) {}
                        foreach($listaabertos as $aba) {}
                        echo $aba->so;
                        ?>
                        <p>Total de Eventos <?php echo $abt->so; ?> </p>
                        <a class="btn-arrow arrow-secondary" href="javascript:void(0)"><?php echo number_format(($aba->so*100/$abt->so),1,",","."); ?>% </a>
                        <div class="parrten">
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-7 box-col-12 des-xl-100 dashboard-sec">
                <div class="col-xl-12 recent-order-sec">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          <h5>Próximos eventos</h5>
                          <table class="table table-bordernone">                                         
                            <thead>
                              <tr>                                        
                                <th>Responsável</th>
                                <th>Ocupação</th>
                                <th>Data</th>
                                <th>Inicio</th>
                                <th>Fim</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listaeventos as $ev){?>
                              <tr>
                                <td>
                                  <?php echo $ev->resp ?>
                                </td>
                                <td>
                                  <p><?php echo $ev->ocupacao ?></p>
                                </td>
                                <td>
                                  <p><?php echo date('d/m/Y', strtotime($ev->data_inicio))?></p>
                                </td>
                                <td><?php echo date('h:i', strtotime($ev->data_inicio)); ?></td>
                                <td>
                                  <p><?php echo date('h:i', strtotime($ev->data_fim)); ?></p>
                                </td>
                                
                              </tr>
							<?php } ?>
                            </tbody>
                          </table>
                        </div>
                        
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-xl-8 box-col-12 des-xl-100">
                <div class="row">
                  
                  
                  
                  <div class="col-xl-6 col-50 box-col-6 des-xl-50">
                    <div class="card latest-update-sec">
                      <div class="card-header">
                        <div class="header-top d-sm-flex align-items-center">
                          <h5>Eventos Concluídos</h5>

                        </div>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordernone">
                            <tbody>
                            <?php foreach ($listaconcluidos as $concluido) {?>
                              <tr>
                                <td>
                                  <div class="media">
                                    <div class="media-body"><span><?php echo $concluido->resp ?></span>
                                      <p><?php echo $concluido->produto ?></p>
                                    </div>
                                  </div>
                                </td>
                                <td><?php echo date('d/m/Y', strtotime($concluido->data_inicio)); ?></td>
                                <td><?php echo $concluido->tipo ?></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-xl-6 col-50 box-col-6 des-xl-50">
                    <div class="card latest-update-sec">
                      <div class="card-header">
                        <div class="header-top d-sm-flex align-items-center">
                          <h5>Eventos a concluir</h5>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordernone">
                            <tbody>
                            <?php foreach ($aconcluirem as $aconcluir) {?>
                              <tr>
                                <td>
                                  <div class="media">
                                    <div class="media-body"><span><?php echo $aconcluir->resp ?></span>
                                      <p><?php echo $aconcluir->produto ?></p>
                                    </div>
                                  </div>
                                </td>
                                <td><?php echo date('d/m/Y', strtotime($aconcluir->data_inicio)); ?></td>
                                <td><?php echo $aconcluir->tipo ?></td>
                              </tr>
                              <?php } ?>
                              
                            </tbody>
                          </table>
                        </div>
                        
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              
              <div class="col-xl-4 box-col-12 des-xl-100">
                <div class="row">
                  <div class="col-xl-12 box-col-6 des-xl-50">
                     <div class="card">
                  <div class="card-header pb-0">
                    <h5>Ocupação da Sala</h5>
                  </div>

    <script src="https://cdn.jsdelivr.net/npm/react@16.12/umd/react.production.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-dom@16.12/umd/react-dom.production.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prop-types@15.7.2/prop-types.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-apexcharts@1.3.6/dist/react-apexcharts.iife.min.js"></script>

    <script type="text/babel">
      class ApexChart extends React.Component {
        constructor(props) {
          super(props);

          this.state = {
          
            series: [{
              data: [
                    <?php foreach ($responsavel as $re){?>
                    '<?php echo $re->so ?>',
                    <?php } ?>
                    ]
            }],
            options: {
              chart: {
                type: 'bar',
                height: 350
              },
              plotOptions: {
                bar: {
                  borderRadius: 4,
                  horizontal: true,
                }
              },
              dataLabels: {
                enabled: true
              },
              xaxis: {
                categories: [
                    <?php foreach ($responsavel as $re){?>
                    '<?php echo $re->resp ?>',
                    <?php } ?>

                ],
              }
            },
          
          
          };
        }

      

        render() {
          return (
            <div>
              <div id="chart">
                <ReactApexChart options={this.state.options} series={this.state.series} type="bar" height={350} />
              </div>
              <div id="html-dist"></div>
            </div>
          );
        }
      }

      const domContainer = document.querySelector('#app');
      ReactDOM.render(React.createElement(ApexChart), domContainer);
    </script>
                  
                  <div class="card-body">
                    <div id="app"></div>
                  </div>
                </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
          
          
    

        
          
        </div>
        




