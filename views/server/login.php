<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
?>


<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="panel">
        <div class="panel-body">
          <div class="brand">
            <img class="brand-img" src="../../web/images/logo.svg" alt="...">
            <h2 class="brand-text font-size-18">Server Health App</h2>
          </div>


          <form method="post" action="<?php echo Url::to(['server/login']); ?>" enctype="multipart/form-data"> 
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />

            <?php if( isset($msg) && $msg != "" ) : ?>
              <div role="alert" class="alert dark alert-danger alert-dismissible">
                    <button aria-label="Close" data-dismiss="alert" class="close" type="button">
                      <span aria-hidden="true">×</span>
                    </button>
                    <?php echo $msg; ?>
              </div>
            <?php endif; ?>

            

            <div class="form-group form-material floating">
              <input type="text" class="form-control" name="Login[username]" />
              <label class="floating-label">username</label>
            </div>
            <div class="form-group form-material floating">
              <input type="password" class="form-control" name="Login[password]" />
              <label class="floating-label">Password</label>
            </div>
            <div class="form-group clearfix">
              <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg pull-left">
                <input type="checkbox" id="inputCheckbox" name="remember">
                <label for="inputCheckbox">Remember me</label>
              </div>
              <a class="pull-right" href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg margin-top-40">Log in</button>
          </form>
          <!-- <p>Still no account? Please go to <a href="#">Sign up</a></p> -->
        </div>
      </div>

      <footer class="page-copyright page-copyright-inverse">
        <p>MkitDigital App</p>
        <p>© 2015. All RIGHT RESERVED.</p>
        <div class="social">
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-google-plus" aria-hidden="true"></i>
          </a>
        </div>
      </footer>
    </div>
  </div>
