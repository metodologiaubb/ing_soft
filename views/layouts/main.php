<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\sidenav\SideNav;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();

    /*echo SideNav::widget([
        'type' => SideNav::TYPE_DEFAULT,
        'heading' => 'Options',
        'items' => [
            [
                'url' => '#',
                'label' => 'Home',
                'icon' => 'home'
            ],
            [
                'label' => 'Help',
                'icon' => 'question-sign',
                'items' => [
                    ['label' => 'About', 'icon'=>'info-sign', 'url'=>'#'],
                    ['label' => 'Contact', 'icon'=>'phone', 'url'=>'#'],
                ],
            ],
        ],
    ]);*/

    ?>



    <div class="container-fluid">
        <?='<div class="col-md-2 col-xs-2 col-sm-2 lateral">
				<div class="profile-sidebar">

					<!-- User picture -->
					<div class="profile-userpic">
						<img src="" class="img-responsive img-circle border" alt="foto">
					</div>

					<!-- Sidebar title -->
					<div class="profile-user">
						<div class="profile-name">User</div>
					</div>

					<!-- Sidebar menu -->
					<nav class="profile-menu">
						<ul class="nav navbar vertical">
							<li>
								<a href="#"><i class="glyphicon glyphicon-user"></i> Perfil</a>
							</li>
							<li>
								<a href="#"><i class="glyphicon glyphicon-bell"></i> Solicitudes</a>
							</li>
							<li>
								<a href="#"><i class="glyphicon glyphicon-folder-open"></i> Mis Solicitudes</a>
							</li>
							<li>
								<a href="#"><i class="glyphicon glyphicon-plus"></i> Nueva Solicitud</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>'?>
        <div class="container col-lg-10" style="margin-top: 55px">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>



        <?= $content ?>
        </div>
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
