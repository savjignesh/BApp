
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
    <?php $this->head() ?>
     <!--CUSTOM STYLES-->
    <link href="<?php echo $this->theme->baseUrl ?>/css/style.css" rel="stylesheet" />
    <link href="<?php echo $this->theme->baseUrl ?>/css/custom.css" rel="stylesheet" />
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
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
                    ['label' => 'Item', 'url' => ['/item/index']],
                    ['label' => 'Parties', 'url' => ['/customer/index'],
                        'items' => [
                             ['label' => 'Parties List', 'url' => ['/customer/index']],
                             ['label' => 'Parties Payment', 'url' => ['/customerpay/index']],
                        ],
                    ],
                    // ['label' => 'Vendor', 'url' => ['/vendor/index'],
                    //     'items' => [
                    //          ['label' => 'New Vendor', 'url' => ['/vendor/index']],
                    //          ['label' => 'Vendor Payment', 'url' => ['#']],
                    //     ],
                    // ],
                    ['label' => 'Category', 'url' => ['/category/index']],
                    ['label' => 'Sales Bill', 'url' => ['/bill/index']],
                    ['label' => 'Laider',
                        'items' => [
                             ['label' => 'Cash', 'url' => ['/bill/account?id=5']],
                              ['label' => 'Cash', 'url' => ['/user/settings/profile']],
                        ],
                    ],
                      
                    // ['label' => 'About', 'url' => ['/site/about']],
                    // ['label' => 'Contact', 'url' => ['/site/contact']],


                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        [
                            'label' => Yii::$app->user->identity->username,
                            'items' => [
                                 ['label' => 'Profile', 'url' => ['/user/settings/profile']],
                                 '<li class="divider"></li>',
                                 ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 
                                        'url' => ['/user/security/logout'],
                                        'linkOptions' => ['data-method' => 'post']],
                            ],
                        ],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?php
                if (Yii::$app->user->can('update-branch')) {
                  echo 1;
                }
            ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
