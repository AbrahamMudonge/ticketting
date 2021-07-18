<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\Resources;
use app\helpers\PermissionsList;

$assets = AppAsset::register($this);
$resource = Resources::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body  >
        <?php $this->beginBody() ?>

        <div class="wrap">

            <?php
            NavBar::begin([
                'brandLabel' => '<img src="' . $resource->baseUrl . '/images/logo.png" alt="LOGO" height="50" />',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [['label' => 'MENU', ['label' => 'Home', 'url' => ['/site/index']],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'suppliers', 'url' => ['/suppliers/index'], 'visible' => \Yii::$app->user->can(PermissionsList::VIEW_SUPPLIER)],
                    ['label' => 'suppliertypes', 'url' => ['/suppliertypes/index'], 'visible' => \Yii::$app->user->can(PermissionsList::VIEW_SUPPLIER_LIST)],
                    ['label' => 'suppliercontact', 'url' => ['/supplierscontact/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_SUPPLIERCONTACT)],
                    ['label' => 'apply leave', 'url' => ['/leaveapplication/index'], 'visible' => \Yii::$app->user->can(PermissionsList::APPLY_LEAVE)],
                    ['label' => 'Approve', 'url' => ['/leaveapplication/approve'], 'visible' => \Yii::$app->user->can(PermissionsList::APPROVE_LEAVE)],
                    ['label' => 'departments', 'url' => ['/departments/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_DEPARTMENTS)],
                    ['label' => 'staffdept', 'url' => ['/staff-department/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_STAFFDEPT)],
                    ['label' => 'targets', 'url' => ['/targets/index'], 'visible' => \Yii::$app->user->can(PermissionsList::SET_TARGETS)],
                    ['label' => 'clienttypes', 'url' => ['/clienttypes/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_CLIENTTYPES)],
                    ['label' => 'sources', 'url' => ['/sources/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_SOURCES)],
                    ['label' => 'clients', 'url' => ['/clients/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_CLIENT)],
                    ['label' => 'clientcontact', 'url' => ['/clientcontact/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_CLIENTCONTACT)],
                    ['label' => 'sales  ticket', 'url' => ['/salesticket/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_SALESTICKET)],
                    ['label' => 'technical  ticket', 'url' => ['/technicalticket/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_TECHNICALTICKET)],
                    ['label' => 'procurement', 'url' => ['/procurement/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_PROCUREMENT)],
                    ['label' => 'Margins', 'url' => ['/procurement/margins'], 'visible' => \Yii::$app->user->can(PermissionsList::VIEW_MARGINS)],
                    ['label' => 'banks', 'url' => ['/bank/index'], 'visible' => !Yii::$app->user->isGuest],
                    Yii::$app->user->isGuest ? (
                            ['label' => 'Login', 'url' => Url::toRoute('user/security/login')]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/user/security/logout'], 'post')
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                            )
                ],],],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; MACKPHILISA TICKETING SYSTEM <?= date('Y') ?></p>

                <p class="pull-right">EagleInc&copy;</p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
