<!-- Page Sidebar Start-->
        <header class="main-nav">
          <div class="sidebar-user text-center"><img class="img-90 rounded-circle" src="<?php echo URL_BASE ?>assets/images/dashboard/<?php echo $_SESSION[SESSION_LOGIN]->imagem; ?>" alt="">
            <div class="badge-bottom"><span class="badge badge-primary"></span></div><a href="user-profile.html">
              <h6 class="mt-3 f-14 f-w-600"><?php echo $_SESSION[SESSION_LOGIN]->nome; ?></h6></a>
            <p class="mb-0 font-roboto"><?php echo $_SESSION[SESSION_LOGIN]->cargo; ?></p>
            <ul>
              <li><span><span class="counter">198</span>k</span>
                <p>Atualizações</p>
              </li>
              
              <li><span><span class="counter">95</span>k</span>
                <p>Acessos </p>
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
                      <li><a href="index.html">Chamados</a></li>
                      <li><a href="dashboard-02.html">Modo Relatório</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Parâmetros</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="index.html">Chamados</a></li>
                      <li><a href="dashboard-02.html">Modo Relatório</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Relatórios</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="index.html">Chamados</a></li>
                      <li><a href="dashboard-02.html">Modo Relatório</a></li>
                    </ul>
                  </li>
                  
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Geral             </h6>
                    </div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Dashboard</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="index.html">Modo Gráfico</a></li>
                      <li><a href="dashboard-02.html">Modo Relatório</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Relatórios</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="general-widget.html">Vendas</a></li>
                      <li><a href="chart-widget.html">Leads</a></li>
                      <li><a href="chart-widget.html">Compras</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layout"></i><span>Usuários</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="box-layout.html">Vendedores</a></li>
                      <li><a href="layout-rtl.html">Marketing</a></li>
                      <li><a href="layout-dark.html">Administradores</a></li>
                      <li><a href="footer-light.html">Acessos</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Vendas             </h6>
                    </div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="box"></i><span>Por produto</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="state-color.html">State color</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="avatars.html">Avatars</a></li>
                      <li><a href="helper-classes.html">helper classes</a></li>
                      <li><a href="grid.html">Grid</a></li>
                      <li><a href="tag-pills.html">Tag & pills</a></li>
                      <li><a href="progress-bar.html">Progress</a></li>
                      <li><a href="modal.html">Modal</a></li>
                      <li><a href="alert.html">Alert</a></li>
                      <li><a href="popover.html">Popover</a></li>
                      <li><a href="tooltip.html">Tooltip</a></li>
                      <li><a href="loader.html">Spinners</a></li>
                      <li><a href="dropdown.html">Dropdown</a></li>
                      <li><a href="according.html">Accordion</a></li>
                      <li><a class="submenu-title" href="javascript:void(0)">Tabs<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="tab-bootstrap.html">Bootstrap Tabs</a></li>
                          <li><a href="tab-material.html">Line Tabs</a></li>
                        </ul>
                      </li>
                      <li><a href="navs.html">Navs</a></li>
                      <li><a href="box-shadow.html">Shadow</a></li>
                      <li><a href="list.html">Lists</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="folder-plus"></i><span>Por vendedor</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="scrollable.html">Scrollable</a></li>
                      <li><a href="tree.html">Tree view</a></li>
                      <li><a href="bootstrap-notify.html">Bootstrap Notify</a></li>
                      <li><a href="rating.html">Rating</a></li>
                      <li><a href="dropzone.html">dropzone</a></li>
                      <li><a href="tour.html">Tour</a></li>
                      <li><a href="sweet-alert2.html">SweetAlert2</a></li>
                      <li><a href="modal-animated.html">Animated Modal</a></li>
                      <li><a href="owl-carousel.html">Owl Carousel</a></li>
                      <li><a href="ribbons.html">Ribbons</a></li>
                      <li><a href="pagination.html">Pagination</a></li>
                      <li><a href="steps.html">Steps</a></li>
                      <li><a href="breadcrumb.html">Breadcrumb</a></li>
                      <li><a href="range-slider.html">Range Slider</a></li>
                      <li><a href="image-cropper.html">Image cropper</a></li>
                      <li><a href="sticky.html">Sticky         </a></li>
                      <li><a href="basic-card.html">Basic Card</a></li>
                      <li><a href="creative-card.html">Creative Card</a></li>
                      <li><a href="tabbed-card.html">Tabbed Card</a></li>
                      <li><a href="dragable-card.html">Draggable Card</a></li>
                      <li><a class="submenu-title" href="javascript:void(0)">Timeline<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="timeline-v-1.html">Timeline 1</a></li>
                          <li><a href="timeline-v-2.html">Timeline 2</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="edit-3"></i><span>Por canal</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="form-builder-1.html">Form Builder 1</a></li>
                      <li><a href="form-builder-2.html">Form Builder 2</a></li>
                      <li><a href="pagebuild.html">Page Builder</a></li>
                      <li> <a href="button-builder.html">Button Builder</a></li>
                    </ul>
                  </li>
                  
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Faturamento</h6>
                    </div>
                  </li>
                  <li class="dropdown">          <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="sliders"></i><span>Faturados                </span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="form-validation.html">Form Validation</a></li>
                      <li><a href="base-input.html">Base Inputs</a></li>
                      <li><a href="radio-checkbox-control.html">Checkbox & Radio</a></li>
                      <li><a href="input-group.html">Input Groups</a></li>
                      <li><a href="megaoptions.html">Mega Options </a></li>
                    </ul>
                  </li>
                  <li class="dropdown">          <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="package"></i><span>Vendidos</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="datepicker.html">Datepicker</a></li>
                      <li><a href="time-picker.html">Timepicker</a></li>
                      <li><a href="datetimepicker.html">Datetimepicker</a></li>
                      <li><a href="daterangepicker.html">Daterangepicker</a></li>
                      <li><a href="touchspin.html">Touchspin</a></li>
                      <li><a href="select2.html">Select2</a></li>
                      <li><a href="switch.html">Switch</a></li>
                      <li><a href="typeahead.html">Typeahead</a></li>
                      <li><a href="clipboard.html">Clipboard </a></li>
                    </ul>
                  </li>
                  <li class="dropdown">          <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layout"></i><span>A pagar</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="default-form.html">Default Forms</a></li>
                      <li><a href="form-wizard.html">Form Wizard 1</a></li>
                      <li><a href="form-wizard-two.html">Form Wizard 2</a></li>
                      <li><a href="form-wizard-three.html">Form Wizard 3</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Estoque</h6>
                    </div>
                  </li>
                  <li class="dropdown">          <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="server"></i><span>Para venda             </span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="bootstrap-basic-table.html">Basic Tables</a></li>
                      <li><a href="bootstrap-sizing-table.html">Sizing Tables</a></li>
                      <li><a href="bootstrap-border-table.html">Border Tables</a></li>
                      <li><a href="bootstrap-styling-table.html">Styling Tables</a></li>
                      <li><a href="table-components.html">Table components</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">          <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="database"></i><span>Para Locação   </span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="datatable-basic-init.html">Basic Init</a></li>
                      <li><a href="datatable-advance.html">Advance Init</a></li>
                      <li><a href="datatable-styling.html">Styling</a></li>
                      <li><a href="datatable-AJAX.html">AJAX</a></li>
                      <li><a href="datatable-server-side.html">Server Side</a></li>
                      <li><a href="datatable-plugin.html">Plug-in</a></li>
                      <li><a href="datatable-API.html">API</a></li>
                      <li><a href="datatable-data-source.html">Data Sources</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">          <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="hard-drive"></i><span>Para MarketPlaces  </span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="datatable-ext-autofill.html">Auto Fill</a></li>
                      <li><a href="datatable-ext-basic-button.html">Basic Button</a></li>
                      <li><a href="datatable-ext-col-reorder.html">Column Reorder</a></li>
                      <li><a href="datatable-ext-fixed-header.html">Fixed Header</a></li>
                      <li><a href="datatable-ext-key-table.html">Key Table</a></li>
                      <li><a href="datatable-ext-responsive.html">Responsive</a></li>
                      <li><a href="datatable-ext-row-reorder.html">Row Reorder</a></li>
                      <li><a href="datatable-ext-scroller.html">Scroller                      </a></li>
                    </ul>
                  </li>
                  
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Serviços             </h6>
                    </div>
                  </li>
                  <li class="dropdown">          <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="box"></i><span>Equipamentos                </span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="projects.html">Project List</a></li>
                      <li><a href="projectcreate.html">Create new             </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"></i><span>Tarifação</span></a></li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="kanban.html"><i data-feather="monitor"></i><span>Contratos</span></a></li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="shopping-bag"></i><span>Bilhetagem</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="product.html">Product</a></li>
                      <li><a href="product-page.html">Product page</a></li>
                      <li><a href="list-products.html">Product list</a></li>
                      <li><a href="payment-details.html">Payment Details</a></li>
                      <li><a href="order-history.html">Order History</a></li>
                      <li><a href="invoice-template.html">Invoice</a></li>
                      <li><a href="cart.html">Cart</a></li>
                      <li><a href="list-wish.html">Wishlist</a></li>
                      <li><a href="checkout.html">Checkout</a></li>
                      <li><a href="pricing.html">Pricing</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="mail"></i><span>Faturamento</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="email_inbox.html">Mail Inbox</a></li>
                      <li><a href="email_read.html">Read mail</a></li>
                      <li><a href="email_compose.html">Compose</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="message-circle"></i><span>Chamados</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="chat.html">Chat App</a></li>
                      <li><a href="chat-video.html">Video chat</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="users"></i><span>Ordem de Serviço</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="user-profile.html">Users Profile</a></li>
                      <li><a href="edit-profile.html">Users Edit</a></li>
                      <li><a href="user-cards.html">Users Cards</a></li>
                    </ul>
                  </li>
                                   <li class="sidebar-main-title">
                    <div>
                      <h6>Financeiro             </h6>
                    </div>
                  </li>
                  <li><a class="nav-link menu-title link-nav" href="landing-page.html"><i data-feather="navigation-2"></i><span>Contas a Receber</span></a></li>
                  <li><a class="nav-link menu-title link-nav" href="sample-page.html"><i data-feather="file"></i><span>Contas a Pagar</span></a></li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="internationalization.html"><i data-feather="aperture"></i><span>Fluxo Financeiro</span></a></li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="<?php echo URL_BASE ?>starter-kit/index.html"><i data-feather="anchor"></i><span>Comissões   </span></a></li>
                  <li class="mega-menu"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layers"></i><span>DRE</span></a>
                  <li class="mega-menu"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layers"></i><span>Contabilidade</span></a>
                    <div class="mega-menu-container menu-content">
                      <div class="container">
                        <div class="row">
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Error Page</h5>
                              </div>
                              <div class="submenu-content opensubmegamenu">
                                <ul>
                                  <li><a href="error-page1.html" target="_blank">Error page 1</a></li>
                                  <li><a href="error-page2.html" target="_blank">Error page 2</a></li>
                                  <li><a href="error-page3.html" target="_blank">Error page 3</a></li>
                                  <li><a href="error-page4.html" target="_blank">Error page 4                         </a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5> Authentication</h5>
                              </div>
                              <div class="submenu-content opensubmegamenu">
                                <ul>
                                  <li><a href="login.html" target="_blank">Login Simple</a></li>
                                  <li><a href="login_one.html" target="_blank">Login with bg image</a></li>
                                  <li><a href="login_two.html" target="_blank">Login with image two                      </a></li>
                                  <li><a href="login-bs-validation.html" target="_blank">Login With validation</a></li>
                                  <li><a href="login-bs-tt-validation.html" target="_blank">Login with tooltip</a></li>
                                  <li><a href="login-sa-validation.html" target="_blank">Login with sweetalert</a></li>
                                  <li><a href="sign-up.html" target="_blank">Register Simple</a></li>
                                  <li><a href="sign-up-one.html" target="_blank">Register with Bg Image                              </a></li>
                                  <li><a href="sign-up-two.html" target="_blank">Register with Bg video                          </a></li>
                                  <li><a href="unlock.html">Unlock User</a></li>
                                  <li><a href="forget-password.html">Forget Password</a></li>
                                  <li><a href="creat-password.html">Creat Password</a></li>
                                  <li><a href="maintenance.html">Maintenance</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Coming Soon</h5>
                              </div>
                              <div class="submenu-content opensubmegamenu">
                                <ul>
                                  <li><a href="comingsoon.html">Coming Simple</a></li>
                                  <li><a href="comingsoon-bg-video.html">Coming with Bg video</a></li>
                                  <li><a href="comingsoon-bg-img.html">Coming with Bg Image</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Email templates</h5>
                              </div>
                              <div class="submenu-content opensubmegamenu">
                                <ul>
                                  <li><a href="basic-template.html">Basic Email</a></li>
                                  <li><a href="email-header.html">Basic With Header</a></li>
                                  <li><a href="template-email.html">Ecomerce Template</a></li>
                                  <li><a href="template-email-2.html">Email Template 2</a></li>
                                  <li><a href="ecommerce-templates.html">Ecommerce Email</a></li>
                                  <li><a href="email-order-success.html">Order Success      </a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Compras             </h6>
                    </div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="image"></i><span>Cadastro</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="gallery.html">Cadastro</a></li>
                      <li><a href="gallery-with-description.html">Pedido</a></li>
                      <li><a href="gallery-masonry.html">Sugestão de Compra</a></li>
                     
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="edit"></i><span>Pedido</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="blog.html">Blog Details</a></li>
                      <li><a href="blog-single.html">Blog Single</a></li>
                      <li><a href="add-post.html">Add Post</a></li>
                    </ul>
                  </li>
                  <li><a class="nav-link menu-title link-nav" href="faq.html"><i data-feather="help-circle"></i><span>Sugestão de Compra</span></a></li>
                 
                  
                  </li>
                                 </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
        <!-- Page Sidebar Ends-->