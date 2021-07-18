<?php

use yii\bootstrap\Nav;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\Resources;
use app\helpers\PermissionsList;
?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?= @Yii::$app->user->identity->username ?></p>
<!--                    <a href="<?= $directoryAsset ?>/#">-->
                        <i class="fa fa-circle text-success"></i> Online
                    </a>
                </div>
            </div>
        <?php endif ?>

<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </form>-->

<ul class="sidebar-menu" style="display: none">
    <li> <a href="<?= Yii::$app->getUrlManager()->getBaseUrl()?>" class="navbar-link">
                    <i class="fa fa-home"></i> <span >Home</span>
                </a>
            </li>
            <li> <a href="<?= Yii::$app->getUrlManager()->getBaseUrl()."/targets/index"?>" class="navbar-link">
                    <i class="fa fa-arrows"></i> <span>SET  YOUR  TARGET</span>
                </a>
            </li>
    <li class="treeview">
                <a>
                    <i class="fa fa-bar-chart-o"></i>
                    <span>PROCUREMENT MENU</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/suppliers/index">
                         <i class="fa fa-angle-double-right"></i> suppliers</a>
                    </li>
                    <li><a href="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/suppliertypes/index">
                            <i class="fa fa-angle-double-right"></i> suppliertypes</a>
                    </li>
                   
                </ul>
            </li>
</ul>
        <?php
        use kartik\sidenav\SideNav;
     
echo SideNav::widget([
	'type' => SideNav::TYPE_PRIMARY,
	'heading' => 'MENU',
	'items' => [
		 ['label' => 'Home', 'icon' => 'file-code-o', 'url' => ['/site/index'], 'visible' => !Yii::$app->user->isGuest],
                 ['label' => 'ADMIN MENU', 'url' => ['admin/index'], 'items' => [
                        ['label' => 'Create UserRoles', 'url' => ['/user-roles/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_USERROLES)],
                        ['label' => 'SOURCES', 'url' => ['/sources/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_SOURCES)],
                    ['label' => 'CREATE  USER', 'url' => ['/user/registration/register'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_USER)],
                    ['label' => 'UPDATE USER', 'url' => ['/user/admin/index'], 'visible' => \Yii::$app->user->can(PermissionsList::UPDATE_USER)],
                    ]],
    ['label' => 'SET  YOUR  TARGET', 'url' => ['/targets/index'], 'visible' => \Yii::$app->user->can(PermissionsList::SET_TARGETS)],
                ['label' => 'CLIENTS', 'url' => ['CLIENTS/index'], 'items' => [

                        ['label' => 'CLIENTS', 'url' => ['/clients/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_CLIENT)],
                        ['label' => 'CLIENT  CONTACT', 'url' => ['/clientcontact/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_CLIENTCONTACT)],
                        ['label' => 'CLIENT  TYPES', 'url' => ['/clienttypes/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_CLIENTTYPES)],
                    ]],
    ['label' => 'PROCUREMENT MENU', 'url' => ['suppliers/index'], 'items' => [
                        ['label' => 'SUPPLIERS', 'url' => ['/suppliers/index'], 'visible' => \Yii::$app->user->can(PermissionsList::VIEW_SUPPLIER)],
                        ['label' => 'SUPPLIER  TYPES', 'url' => ['/suppliertypes/index'], 'visible' => \Yii::$app->user->can(PermissionsList::VIEW_SUPPLIER_LIST)],
                        ['label' => 'SUPPLIER  CONTACT', 'url' => ['/supplierscontact/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_SUPPLIERCONTACT)],
                        ['label' => 'PROCUREMENT', 'url' => ['/procurement/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_PROCUREMENT)],
                        ['label' => 'MARGINS', 'url' => ['/procurement/margins'], 'visible' => \Yii::$app->user->can(PermissionsList::VIEW_MARGINS)],
                        ['label' => 'BANKS', 'url' => ['/bank/index'], 'visible' => !Yii::$app->user->isGuest],
                    ]],
            ['label' => 'CREATE  TICKET', 'url' => ['/createticket/index'], 'visible' => \Yii::$app->user->can(PermissionsList::CREATE_TICKET)],
            
            ['label' => 'LEAVE APPLICATION', 'url' => ['leaveapplication/index'], 'items' => [
                        ['label' => 'Apply Leave', 'url' => ['/leaveapplication/index'], 'visible' => \Yii::$app->user->can(PermissionsList::APPLY_LEAVE)],
                        ['label' => 'Approve', 'url' => ['/leaveapplication/approve'], 'visible' => \Yii::$app->user->can(PermissionsList::APPROVE_LEAVE)],
                    ]],
          
            
	],
]);
echo Nav::widget([
    'items'=>  [Yii::$app->user->isGuest ? (
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
]]);         
        ?>
        <!-- You can delete next ul.sidebar-menu. It's just demo. -->



    </section>

</aside>
