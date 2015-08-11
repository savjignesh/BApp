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
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<!-- CSS  -->
	<?php $this->head() ?>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo $this->theme->baseUrl ?>/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="<?php echo $this->theme->baseUrl ?>/css/font-awesome.css" rel="stylesheet" />
	<!-- Custom KeyBord -->
	<link rel="stylesheet" href="<?php echo $this->theme->baseUrl ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl ?>/css/jsKeyboard.css" type="text/css" media="screen"/>
	
    <!--CUSTOM STYLES-->
    <link href="<?php echo $this->theme->baseUrl ?>/css/style.css" rel="stylesheet" />
	<link href="<?php echo $this->theme->baseUrl ?>/css/custom.css" rel="stylesheet" />

    
</head>
<body>

<?php $this->beginBody() ?>
    <div id="wrapper">
		 <!-- NAV TOP  -->
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				
                <a  class="navbar-brand" href="index.html">
				Business App
                </a>
            </div>

            <div class="notifications-wrapper">
			<ul class="nav">    
            
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
							<?php  echo Html::a('<i class="fa fa-user-plus"></i> My Profile', ['/user/settings/profile']);  ?>
                        </li>
                        <li class="divider"></li>
                        <li>
						<?php if(Yii::$app->user->isGuest){ echo Html::a('<i class="fa fa-sign-out"></i> Login', ['/user/security/login']);
							  }else{ echo Html::a('<i class="fa fa-sign-out"></i> Logout', ['/user/security/logout'], ['data-method' => 'post']); } ?>
                        </li>
                    </ul>
                </li>
            </ul>
               
            </div>
        </nav>
        <!-- /. NAV TOP  -->
		
		<nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <!--<li>
                        <div class="user-img-div">
                            <img src="<?php //echo $this->theme->baseUrl ?>/img/1.jpg" class="img-circle" />      
                        </div>

                    </li> -->
                    <li>
                        <a  href="#"> <strong> User name </strong></a>
                    </li>
                    <li>
                        <a class="active-menu"  href="/BApp/web/site/index"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
						<?= Html::a('<i class="fa fa-venus "></i>Item Page', ['item/index']) ?>      
                    </li>
                    
                    <li>            
                        <?= Html::a('<i class="fa fa-bolt "></i>Customer Details', ['customer/index']) ?>
                    </li>
                             
                     <li>           
						<?= Html::a('<i class="fa fa-code "></i>Category', ['category/index']) ?>
                    </li>
					<li>
						<?= Html::a('<i class="fa fa-dashcube"></i>Bill', ['bill/index']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-bolt"></i>Customer Discount', ['custitemdiscount/index']) ?>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-cogs "></i>Second  Link</a>
                            </li>
                             <li>
                                <a href="#"><i class="fa fa-bullhorn "></i>Second Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third  Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                </ul> 
            </div>

        </nav>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <?php 
		/*
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
					[
					   'label' => 'Status',
					   'items' => [
							['label' => 'Create', 'url' => ['/status/create']],
						],
					], 
                    ['label' => 'Test', 'url' => ['/test/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();  */
        ?>

        <div id="page-wrapper" class="page-wrapper-cls">
			
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
			
			<div class="col-md-8">
				<?= $content ?>
			</div>
			
			<div class="col-md-4">
				 <div id="virtualKeyboard"></div>
			</div>
			
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
	<!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<?php $this->endBody() ?>
    <!-- JQUERY SCRIPTS -->
    <!--<script src="<?php //echo $this->theme->baseUrl ?>/js/jquery-1.11.1.js"></script> -->
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo $this->theme->baseUrl ?>/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo $this->theme->baseUrl ?>/js/jquery.metisMenu.js"></script>
	
	<!-- For KeyBord -->
	
	<script type="text/javascript" src="<?php echo $this->theme->baseUrl ?>/js/jsKeyboard.js"></script>
	<script src="<?php echo $this->theme->baseUrl ?>/js/main.js"></script>
	
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo $this->theme->baseUrl ?>/js/custom.js"></script>
<script>

jQuery(document).ready(function($) {
	//$("#cool-filters").keyup(function(){
	//	$.pjax.reload({container:'#countries'});
	//	console.log('up');
	//});
	});
		
</script>

</body>
</html>
<?php $this->endPage() ?>
