<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DashboardAsset;
use yii\helpers\Url;

DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en" lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <?= Html::csrfMetaTags() ?>
   <title><?= Html::encode($this->title) ?></title>
    <link rel="apple-touch-icon" href="../../assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="../../assets/images/favicon.ico">
    <?php $this->head() ?>

    <script>
        Breakpoints();
    </script>
</head>

<body class="">
<?php $this->beginBody() ?>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Menu Superior -->
    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
        data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
        data-toggle="collapse">
          <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
          <!-- <img class="navbar-brand-logo" src="../../assets/images/logo.png" title="Remark"> -->
          <span class="navbar-brand-text"> MkitDigital</span>
        </div>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
        data-toggle="collapse">
          <span class="sr-only">Toggle Search</span>
          <i class="icon wb-search" aria-hidden="true"></i>
        </button>
      </div>

      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="hidden-float" id="toggleMenubar">
              <a data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                    <span class="sr-only">Toggle menubar</span>
                    <span class="hamburger-bar"></span>
                  </i>
              </a>
            </li>
            <li class="hidden-xs" id="toggleFullscreen">
              <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                <span class="sr-only">Toggle fullscreen</span>
              </a>
            </li>
            <li class="hidden-float">
              <a class="icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
              role="button">
                <span class="sr-only">Toggle Search</span>
              </a>
            </li>


            <!-- Mega menu -->
            <!--
              <li class="dropdown dropdown-fw dropdown-mega">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                data-animation="fade" role="button">Mega <i class="icon wb-chevron-down-mini" aria-hidden="true"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li role="presentation">
                    <div class="mega-content">
                      <div class="row">
                        <div class="col-sm-4">
                          <h5>UI Kit</h5>
                          <ul class="blocks-2">
                            <li class="mega-menu margin-0">
                              <ul class="list-icons">
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../advanced/animation.html">Animation</a>
                                </li>
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../uikit/buttons.html">Buttons</a>
                                </li>
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../uikit/colors.html">Colors</a>
                                </li>
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../uikit/dropdowns.html">Dropdowns</a>
                                </li>
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../uikit/icons.html">Icons</a>
                                </li>
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../advanced/lightbox.html">Lightbox</a>
                                </li>
                              </ul>
                            </li>
                            <li class="mega-menu margin-0">
                              <ul class="list-icons">
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../uikit/modals.html">Modals</a>
                                </li>
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../uikit/panel-structure.html">Panels</a>
                                </li>
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../structure/overlay.html">Overlay</a>
                                </li>
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../uikit/tooltip-popover.html ">Tooltips</a>
                                </li>
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../advanced/scrollable.html">Scrollable</a>
                                </li>
                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                  <a
                                  href="../uikit/typography.html">Typography</a>
                                </li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                        <div class="col-sm-4">
                          <h5>Media
                            <span class="badge badge-success">4</span>
                          </h5>
                          <ul class="blocks-3">
                            <li>
                              <a class="thumbnail margin-0" href="javascript:void(0)">
                                <img class="width-full" src="../../assets/photos/placeholder.png" alt="..." />
                              </a>
                            </li>
                            <li>
                              <a class="thumbnail margin-0" href="javascript:void(0)">
                                <img class="width-full" src="../../assets/photos/placeholder.png" alt="..." />
                              </a>
                            </li>
                            <li>
                              <a class="thumbnail margin-0" href="javascript:void(0)">
                                <img class="width-full" src="../../assets/photos/placeholder.png" alt="..." />
                              </a>
                            </li>
                            <li>
                              <a class="thumbnail margin-0" href="javascript:void(0)">
                                <img class="width-full" src="../../assets/photos/placeholder.png" alt="..." />
                              </a>
                            </li>
                            <li>
                              <a class="thumbnail margin-0" href="javascript:void(0)">
                                <img class="width-full" src="../../assets/photos/placeholder.png" alt="..." />
                              </a>
                            </li>
                            <li>
                              <a class="thumbnail margin-0" href="javascript:void(0)">
                                <img class="width-full" src="../../assets/photos/placeholder.png" alt="..." />
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-sm-4">
                          <h5 class="margin-bottom-0">Accordion</h5>
                          
                          <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true"
                          role="tablist">
                            <div class="panel">
                              <div class="panel-heading" id="siteMegaAccordionHeadingOne" role="tab">
                                <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne" data-parent="#siteMegaAccordion"
                                aria-expanded="false" aria-controls="siteMegaCollapseOne">
                                    Collapsible Group Item #1
                                  </a>
                              </div>
                              <div class="panel-collapse collapse" id="siteMegaCollapseOne" aria-labelledby="siteMegaAccordionHeadingOne"
                              role="tabpanel">
                                <div class="panel-body">
                                  De moveat laudatur vestra parum doloribus labitur sentire partes, eripuit praesenti
                                  congressus ostendit alienae, voluptati ornateque
                                  accusamus clamat reperietur convicia albucius.
                                </div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading" id="siteMegaAccordionHeadingTwo" role="tab">
                                <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseTwo"
                                data-parent="#siteMegaAccordion" aria-expanded="false"
                                aria-controls="siteMegaCollapseTwo">
                                    Collapsible Group Item #2
                                  </a>
                              </div>
                              <div class="panel-collapse collapse" id="siteMegaCollapseTwo" aria-labelledby="siteMegaAccordionHeadingTwo"
                              role="tabpanel">
                                <div class="panel-body">
                                  Praestabiliorem. Pellat excruciant legantur ullum leniter vacare foris voluptate
                                  loco ignavi, credo videretur multoque choro fatemur
                                  mortis animus adoptionem, bello statuat expediunt
                                  naturales.
                                </div>
                              </div>
                            </div>

                            <div class="panel">
                              <div class="panel-heading" id="siteMegaAccordionHeadingThree" role="tab">
                                <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseThree"
                                data-parent="#siteMegaAccordion" aria-expanded="false"
                                aria-controls="siteMegaCollapseThree">
                                    Collapsible Group Item #3
                                  </a>
                              </div>
                              <div class="panel-collapse collapse" id="siteMegaCollapseThree" aria-labelledby="siteMegaAccordionHeadingThree"
                              role="tabpanel">
                                <div class="panel-body">
                                  Horum, antiquitate perciperet d conspectum locus obruamus animumque perspici probabis
                                  suscipere. Desiderat magnum, contenta poena desiderant
                                  concederetur menandri damna disputandum corporum.
                                </div>
                              </div>
                            </div>
                          </div>
                         
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              -->
            <!-- End Mega menu -->

          </ul>
          <!-- End Navbar Toolbar -->

          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <!-- Language -->
            <!--
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up"
              aria-expanded="false" role="button">
                <span class="flag-icon flag-icon-us"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem">
                    <span class="flag-icon flag-icon-gb"></span> English</a>
                </li>
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem">
                    <span class="flag-icon flag-icon-fr"></span> French</a>
                </li>
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem">
                    <span class="flag-icon flag-icon-cn"></span> Chinese</a>
                </li>
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem">
                    <span class="flag-icon flag-icon-de"></span> German</a>
                </li>
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem">
                    <span class="flag-icon flag-icon-nl"></span> Dutch</a>
                </li>
              </ul>
            </li>
            -->
            <!-- End Language -->

            <!-- Top Menu-->
            <li class="dropdown">
              <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
              data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  <!-- <img src="../../assets/portraits/5.jpg" alt="..."> -->
                  <i></i>
                </span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                </li>
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
                </li>
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                </li>
                <li class="divider" role="presentation"></li>
                <li role="presentation">
                  <a href="<?php echo Url::to(['server/logout']); ?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                </li>
              </ul>
            </li>
            <!-- End Top Menu-->

            <!-- Notifications-->
            <!--
            <li class="dropdown">
              <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"
              data-animation="scale-up" role="button">
                <i class="icon wb-bell" aria-hidden="true"></i>
                <span class="badge badge-danger up">5</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                <li class="dropdown-menu-header" role="presentation">
                  <h5>NOTIFICATIONS</h5>
                  <span class="label label-round label-danger">New 5</span>
                </li>

                <li class="list-group" role="presentation">
                  <div data-role="container">
                    <div data-role="content">
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">A new order has been placed</h6>
                            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">5 hours ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Completed the task</h6>
                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">2 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Settings updated</h6>
                            <time class="media-meta" datetime="2015-06-11T14:05:00+08:00">2 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Event started</h6>
                            <time class="media-meta" datetime="2015-06-10T13:50:18+08:00">3 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Message received</h6>
                            <time class="media-meta" datetime="2015-06-10T12:34:48+08:00">3 days ago</time>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </li>
                <li class="dropdown-menu-footer" role="presentation">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                  </a>
                  <a href="javascript:void(0)" role="menuitem">
                      All notifications
                    </a>
                </li>
              </ul>
            </li>
            -->
            <!-- End Notifications-->

            <!-- Messages-->
            <!--
            <li class="dropdown">
              <a data-toggle="dropdown" href="javascript:void(0)" title="Messages" aria-expanded="false"
              data-animation="scale-up" role="button">
                <i class="icon wb-envelope" aria-hidden="true"></i>
                <span class="badge badge-info up">3</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                <li class="dropdown-menu-header" role="presentation">
                  <h5>MESSAGES</h5>
                  <span class="label label-round label-info">New 3</span>
                </li>

                <li class="list-group" role="presentation">
                  <div data-role="container">
                    <div data-role="content">
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <span class="avatar avatar-sm avatar-online">
                              <img src="../../assets/portraits/2.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Mary Adams</h6>
                            <div class="media-meta">
                              <time datetime="2015-06-17T20:22:05+08:00">30 minutes ago</time>
                            </div>
                            <div class="media-detail">Anyways, i would like just do it</div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <span class="avatar avatar-sm avatar-off">
                              <img src="../../assets/portraits/3.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Caleb Richards</h6>
                            <div class="media-meta">
                              <time datetime="2015-06-17T12:30:30+08:00">12 hours ago</time>
                            </div>
                            <div class="media-detail">I checheck the document. But there seems</div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <span class="avatar avatar-sm avatar-busy">
                              <img src="../../assets/portraits/4.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">June Lane</h6>
                            <div class="media-meta">
                              <time datetime="2015-06-16T18:38:40+08:00">2 days ago</time>
                            </div>
                            <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <span class="avatar avatar-sm avatar-away">
                              <img src="../../assets/portraits/5.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Edward Fletcher</h6>
                            <div class="media-meta">
                              <time datetime="2015-06-15T20:34:48+08:00">3 days ago</time>
                            </div>
                            <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </li>
                <li class="dropdown-menu-footer" role="presentation">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                  </a>
                  <a href="javascript:void(0)" role="menuitem">
                      See all messages
                    </a>
                </li>
              </ul>
            </li>
            -->
            <!-- End Messages-->

            <!-- Chat -->
            <!-- 
            <li id="toggleChat">
              <a data-toggle="site-sidebar" href="javascript:void(0)" title="Chat" data-url="../site-sidebar.tpl">
                <i class="icon wb-chat" aria-hidden="true"></i>
              </a>
            </li>
            -->
            <!-- End Chat -->
          </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->

        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
          <form role="search">
            <div class="form-group">
              <div class="input-search">
                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                data-toggle="collapse" aria-label="Close"></button>
              </div>
            </div>
          </form>
        </div>
        <!-- End Site Navbar Seach -->
      </div>
    </nav>
   <!-- Fin Menu Superior -->


  <!-- Menu Izquierdo -->
  <div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu">
            <li class="site-menu-category">General</li>
            
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" data-slug="layout">
                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                <span class="site-menu-title">Servers</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo Url::to(['server/index']); ?>" data-slug="layout-menu-collapsed">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">List</span>
                  </a>
                </li>
      
              </ul>
            </li>
            
          
            
          </ul>

        
        </div>
      </div>
    </div>

    <div class="site-menubar-footer">
      <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
      data-original-title="Settings">
        <span class="icon wb-settings" aria-hidden="true"></span>
      </a>
      <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
        <span class="icon wb-eye-close" aria-hidden="true"></span>
      </a>
      <a href="<?php echo Url::to(['server/logout']); ?>"  data-placement="top" data-toggle="tooltip" data-original-title="Logout">
        <span class="icon wb-power" aria-hidden="true"></span>
      </a>
    </div>
  </div>
  <!-- Fin Menu Izquierdo -->

  <!-- Menu Grid menu -->
  <!-- 
  <div class="site-gridmenu">
    <div>
      <div>
        <ul>
          <li>
            <a href="../apps/mailbox/mailbox.html">
              <i class="icon wb-envelope"></i>
              <span>Mailbox</span>
            </a>
          </li>
          <li>
            <a href="../apps/calendar/calendar.html">
              <i class="icon wb-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
          <li>
            <a href="../apps/contacts/contacts.html">
              <i class="icon wb-user"></i>
              <span>Contacts</span>
            </a>
          </li>
          <li>
            <a href="../apps/media/overview.html">
              <i class="icon wb-camera"></i>
              <span>Media</span>
            </a>
          </li>
          <li>
            <a href="../apps/documents/categories.html">
              <i class="icon wb-order"></i>
              <span>Documents</span>
            </a>
          </li>
          <li>
            <a href="../apps/projects/projects.html">
              <i class="icon wb-image"></i>
              <span>Project</span>
            </a>
          </li>
          <li>
            <a href="../apps/forum/forum.html">
              <i class="icon wb-chat-group"></i>
              <span>Forum</span>
            </a>
          </li>
          <li>
            <a href="../index.html">
              <i class="icon wb-dashboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  -->
  <!-- Menu Grid menu -->

     <?= $content ?>

  <!-- Footer -->
  <footer class="site-footer">
    <span class="site-footer-legal">© 2015 <a href="#">MkitDigital</a></span>
    <div class="site-footer-right">
      <!--- MkitDigital App <i class="red-600 wb wb-heart"></i> by <a href="#">MkitDigital</a> -->
    </div>
  </footer>
  <!--End Footer -->


<?php $this->endBody() ?>

  <!-- Core -->
  <script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/bootstrap/bootstrap.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/animsition/jquery.animsition.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/asscroll/jquery-asScroll.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/asscrollable/jquery.asScrollable.all.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
  <!-- End Core -->

  <!-- Plugins -->
  <script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/switchery/switchery.min.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/intro-js/intro.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/screenfull/screenfull.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/slidepanel/jquery-slidePanel.js"></script>
  <!-- End Plugins -->

  <!-- Page Plugins -->  
  <script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/jquery-placeholder/jquery.placeholder.js"></script>
  <!-- End Page Plugins -->  

  <!-- Scripts -->
  <script src="<?php echo Yii::$app->homeUrl; ?>js/core.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/site.js"></script>

  <script src="<?php echo Yii::$app->homeUrl; ?>js/sections/menu.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/sections/menubar.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/sections/gridmenu.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/sections/sidebar.js"></script>

  <script src="<?php echo Yii::$app->homeUrl; ?>js/configs/config-colors.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/configs/config-tour.js"></script>

  <script src="<?php echo Yii::$app->homeUrl; ?>js/components/asscrollable.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/components/animsition.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/components/slidepanel.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/components/switchery.js"></script>
  <!-- End Scripts -->

  <!-- Scripts For This Page -->
  <script src="<?php echo Yii::$app->homeUrl; ?>js/components/jquery-placeholder.js"></script>
  <script src="<?php echo Yii::$app->homeUrl; ?>js/components/material.js"></script>
  <!-- End Scripts For This Page -->

   <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>

</body>
</html>
<?php $this->endPage() ?>
