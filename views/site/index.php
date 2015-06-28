<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Modal;
$this->title = 'My Yii Application';
?>

<div class="site-index" id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-head-line">DASHBOARD<?php //echo var_dump(Yii::$app->request); ?></h1>
		</div>
	</div>
	<div class="row">
            <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-one">
					<?= Html::a('<span class="glyphicon glyphicon-headphones"></span><h5>Item</h5>', ['item/index']) ?>
                </div>
            </div>
              <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-two">
					<?= Html::a('<span class="glyphicon glyphicon-repeat"></span><h5>Customer</h5>', ['customer/index']) ?>
                </div>
              </div>
             <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-three">
					<?= Html::a('<span class="glyphicon glyphicon-camera"></span><h5>Category</h5>', ['item/index']) ?>
                </div>
             </div>
              <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-four">
					<?= Html::a('<span class="glyphicon glyphicon-headphones"></span><h5>Some Sample Text</h5>', ['item/index']) ?>
					
                </div>
			  </div>      
    </div>
    <div class="jumbotron">
        <p><a class="btn btn-lg btn-success" href="#">Get started with Business App</a></p>
    </div>

	
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="#">Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="#">Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="#">Extensions &raquo;</a></p>
            </div>
		



        </div>

    </div>
</div>
