<meta http-equiv="refresh" content="1200;url=#">
<link href="<?php echo URL_BASE ?>assets/styles.css" rel="stylesheet" />
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
                          <i data-feather="unlock"></i>
                        </div>
                        <h5>ABERTOS</h5>
                        <?php 
                        $c = 0; foreach($lista as $chamados) {
                        $c++;
                        }
                        ?>
                        <p>Total de Chamados <?php echo $aberto->soma; ?> </p><a class="btn-arrow arrow-primary" href="javascript:void(0)"><?php echo number_format(($aberto->soma*100/$c),1,",","."); ?>% </a>
                        <div class="parrten">

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">                                    
                      <div class="card-body text-center">
                        <div class="round-box">
                         
                         <i data-feather="lock"></i>
                                </div>
                        <h5>CONCLUÍDOS</h5>
                        <p>Total de Chamados <?php echo $fechados->soma; ?> </p>
                        <a class="btn-arrow arrow-secondary" href="javascript:void(0)"><?php echo number_format(($fechados->soma*100/$c),1,",","."); ?>% </a>
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
                          <h5>Chamados Mais Recentes</h5>
                          <table class="table table-bordernone">                                         
                            <thead>
                              <tr>                                        
                                <th>ID</th>
                                <th>Status</th>
                                <th>Cliente</th>
                                <th>Início</th>
                                <th>Atualizado</th>
                                <th>SLA</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listachamados as $chamados){?>
                              <tr>
                                <td>
                                  <?php echo $chamados->id_chamado ?>
                                </td>
                                <td>
                                  <p><?php echo $chamados->posvendas_status_atendimento ?></p>
                                </td>
                                <td>
                                  <p><?php echo $chamados->nome ?></p>
                                </td>
                                <td><?php echo date('d/m/Y', strtotime($chamados->data_abertura)); ?></td>
                                <td>
                                  <p><?php echo date('d/m/Y', strtotime($chamados->data_atualizacao)); ?></p>
                                </td>
                                <td>
                                  <p>
                                  <?php 
                                      $data_limite = date('d/m/Y', strtotime('+30 days', strtotime($chamados->data_abertura)));
                                      $data_limite_ing = date('Y-m-d', strtotime('+30 days', strtotime($chamados->data_abertura)));
                                      $hoje = date('d/m/Y', strtotime(date('Y-m-d')));
                                      //echo $data_limite."<br>";
                                      //echo $hoje."<br>";
                                      $diferenca = strtotime($data_limite_ing) - strtotime(date('Y-m-d'));
                                      $dias = floor($diferenca / (60 * 60 * 24));
                                      echo $dias;
                                   ?>
									Dias <i class="icofont icofont-clock-time"></i></p>
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
              

            </div>
          </div>
          <!-- Container-fluid Ends-->
          
           <!-- Relatórios Agenda-->
           
    <script src="https://cdn.jsdelivr.net/npm/react@16.12/umd/react.production.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-dom@16.12/umd/react-dom.production.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prop-types@15.7.2/prop-types.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-apexcharts@1.3.6/dist/react-apexcharts.iife.min.js"></script>
    
    
    <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Treinamentos Concluídos</h5>
                  </div>
                  <div class="card-body">
                    <div id="chart" style="border:0;box-shadow: none;"></div>
                    
                    <script>
      
        var options = {
          series: [{
          name: 'ILDO',
          data: [
          		<?php foreach ($meses5 as $mes5){?>
            '<?php echo $mes5->CONCLUIDO5 ?>',
           <?php } ?>
				]
        }, {
          name: 'VANESSA',
          data: [
          		<?php foreach ($meses5 as $mes5){?>
            '<?php echo $mes5->CONCLUIDO6 ?>',
           <?php } ?>
				]
        },
        {
          name: 'GRACIELE',
          data: [
          		<?php foreach ($meses5 as $mes5){?>
            '<?php echo $mes5->CONCLUIDO17 ?>',
           <?php } ?>
				]
        }
        ],
          chart: {
          type: 'bar',
          height: 350,
           toolbar: {
            tools: {
              download: false,
            }
        }
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        
		dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val;
          },
          offsetY:-30,
          style: {
            fontSize: '18px',
            colors: ["#304758"]
          }
        },
        
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        },
        yaxis: {
          title: {
            text: 'CONCLUÍDOS'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " Concluídos"
            }
          }
        },
        
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
    </script>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Treinamentos não Concluídos</h5>
                  </div>
                  <div class="card-body">
                    <div id="chart1"></div>
                     <script>
      
                    var options = {
                      series: [{
                      name: 'ILDO',
                      data: [
                      		<?php foreach ($meses6 as $mes6){?>
                        '<?php echo $mes6->CONCLUIDO5N ?>',
                       <?php } ?>
            				]
                    }, {
                      name: 'VANESSA',
                      data: [
                      		<?php foreach ($meses6 as $mes6){?>
                        '<?php echo $mes6->CONCLUIDO6N ?>',
                       <?php } ?>
            				]
                    },
                    {
                      name: 'GRACIELE',
                      data: [
                      		<?php foreach ($meses6 as $mes6){?>
                        '<?php echo $mes6->CONCLUIDO17N ?>',
                       <?php } ?>
            				]
                    }
                    ],
                      chart: {
                      type: 'bar',
                      height: 350,
                      toolbar: {
                        tools: {
                          download: false,
                        }
                    }
                    },
                    plotOptions: {
                      bar: {
                        borderRadius: 10,
                        dataLabels: {
                          position: 'top', // top, center, bottom
                        },
                      }
                    },
                    
            		dataLabels: {
                      enabled: true,
                      formatter: function (val) {
                        return val;
                      },
                      offsetY:-30,
                      style: {
                        fontSize: '18px',
                        colors: ["#304758"]
                      }
                    },
                    
                    stroke: {
                      show: true,
                      width: 2,
                      colors: ['transparent']
                    },
                    xaxis: {
                      categories: ['Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    },
                    yaxis: {
                      title: {
                        text: 'NÃO CONCLUÍDOS'
                      }
                    },
                    fill: {
                      opacity: 1
                    },
                    tooltip: {
                      y: {
                        formatter: function (val) {
                          return val + " Concluídos"
                        }
                      }
                    }
                    };
            
                    var chart1 = new ApexCharts(document.querySelector("#chart1"), options);
                    chart1.render();
                </script>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Uso da sala de treinamento</h5>
                  </div>
                  <div class="card-body">
                    <div id="pie"></div>
                    <script>
                    
                    var options = {
                  	series: [<?php foreach ($responsavel as $re){?>
                            <?php echo $re->so ?>,
                            <?php } ?>],
                            
                  chart: {
                  height: '250%',
                  type: 'pie',
                },
                labels: [
        				<?php foreach ($responsavel as $re){
        				    $primeiroNome = explode(" ", $re->resp );
        				    ?>
                            '<?php echo  $primeiroNome[0] ?>',
                            <?php } ?>
        				],
                theme: {
                  monochrome: {
                    enabled: false
                  }
                },
                fill: {
                  type: 'gradient',
                },
                plotOptions: {
                  pie: {
                    dataLabels: {
                      offset: 25
                    }
                  }
                },
                
                dataLabels: {
                  style: {
                  fontSize: '18px',
                    colors: ['#000000'],
                  },
                  stroke: {
                  width: 1,
                  colors: ['#FFFFFF']
                },
                
                dropShadow: {
                    enabled: false,
                    
                  },
                 
                  formatter(val, opts) {
                    const name = opts.w.globals.labels[opts.seriesIndex]
                    return [name, val.toFixed(1) + '%']
                  }
                },
                
                
                
                legend: {
                  show: false
                }
                };
        
                var chart = new ApexCharts(document.querySelector("#pie"), options);
                chart.render();
      
    			</script>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Chamados por Status </h5>
                  </div>
                  <div class="card-body">
                    <div id="app" style="border:0;box-shadow: none;"></div>
                    
                    <script type="text/babel">
      class ApexChart extends React.Component {
        constructor(props) {
          super(props);

          this.state = {
          
            series: [{
              data: [
                    <?php foreach ($listast as $st){?>
                    '<?php echo $st->so ?>',
                    <?php } ?>
                    ]
            }],

            options: {
              chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                        tools: {
                          download: false,
                        }
                    }
              },

            plotOptions: {
            bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
            legend: {
          show: false
        },
          }
        },

            colors: ['#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', '#2b908f', '#f9a3a4', '#90ee7e',
          '#f48024', '#69d2e7'
            ],
        
             dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val;
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
              xaxis: {
                categories: [
                    <?php foreach ($listast as $st){?>
                    '<?php echo $st->posvendas_status_atendimento ?>',
                    <?php } ?>

                ],
              }
            },
          
          
          };
        }

      

        render() {
          return (
                <ReactApexChart options={this.state.options} series={this.state.series} type="bar" height={350} />
          );
        }
      }

      const domContainer = document.querySelector('#app');
      ReactDOM.render(React.createElement(ApexChart), domContainer);
    </script>
                    
                  </div>
                </div>
              </div>
              
              
              
              <div class="col-xl-6 col-50 box-col-6 des-xl-50">
                    <div class="card latest-update-sec">
                      <div class="card-header">
                        <div class="header-top d-sm-flex align-items-center">
                          <h5>Chamados a Expirar</h5>

                        </div>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordernone">
                            <tbody>
                            <?php foreach ($listaa as $dias) {?>
                              <tr>
                                <td>
                                  <div class="media">
                                    <div class="media-body"><span><?php echo $dias->nome ?></span>
                                      <p><?php echo $dias->assunto_chamado ?></p>
                                    </div>
                                  </div>
                                </td>
                                <td><?php echo ($dias->data_atualizacao)?date('d/m/Y', strtotime($dias->data_atualizacao)):""; ?></td>
                                <td><?php 
                                $data_limite = date('d/m/Y', strtotime('+30 days', strtotime($dias->data_abertura)));
                                $data_limite_ing = date('Y-m-d', strtotime('+30 days', strtotime($dias->data_abertura)));
                              $hoje = date('d/m/Y', strtotime(date('Y-m-d')));
                              //echo $data_limite."<br>";
                              //echo $hoje."<br>";
                              $diferenca = strtotime($data_limite_ing) - strtotime(date('Y-m-d'));
                              $dias = floor($diferenca / (60 * 60 * 24));
                              echo $dias."d";
                              ?></td>
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
                          <h5>Últimos Chamados Concluídos</h5>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordernone">
                            <tbody>
                            <?php foreach ($listaf as $diasf) {?>
                              <tr>
                                <td>
                                  <div class="media">
                                    <div class="media-body"><span><?php echo $diasf->nome ?></span>
                                      <p><?php echo $diasf->assunto_chamado ?></p>
                                    </div>
                                  </div>
                                </td>
                                <td><?php echo ($diasf->data_fechamento != (0000-00-00)) ? date('d/m/Y', strtotime($diasf->data_fechamento)):null; ?></td>
                                <td><?php echo $diasf->motivo ?></td>
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
    
                 


