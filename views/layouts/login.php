<?php

/* @var $this \yii\web\View */
/* @var $content string */

use Yii;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\LoginAsset;

LoginAsset::register($this);
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

<body class="page-login-v3 layout-full">
<?php $this->beginBody() ?>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

     <?= $content ?>


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
