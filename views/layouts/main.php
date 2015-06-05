<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Onze222</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/bootstrap/html5shiv.js"></script>
      <script src="js/bootstrap/respond.min.js"></script>
    <![endif]-->
  </head>
<body>

<?php $this->beginBody() ?>

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">Onze222</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <?php
          // echo'<pre>';
          // var_dump(Yii::$app->user->identity);
           if(!Yii::$app->user->isGuest){?>
          <ul class="nav navbar-nav">
            <!-- <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="#">Example 1</a></li>
                <li class="divider"></li>
                <li><a href="#">Example 2</a></li>
                <li><a href="#">Example 3</a></li>
                <li><a href="#">Example 4</a></li>
              </ul>
            </li> -->
            <li>
              <a href="/student">Student</a>
            <li>
            <li>
              <a href="/responsible">Responsible</a>
            </li>
          </ul>
        
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo Yii::$app->user->identity->username?></li>
            <li><a href="login/logout">logout</a></li>
          </ul>
         <?php } ?>
        </div>
      </div>
    </div>
       
    <div class="container">
        <div class="row">
            <?= $content ?>
        </div>
    </div>
   

<footer class="footer">
    <p class="">&copy;Onze222 <?= date('Y') ?></p>
    <p class="">Sofia01</p>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
