<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use app\models\Procurement;
use app\models\Targets;

?>
<aside class="right-side">

    <section class="content-header">
        <h1>
            <?php
            if ($this->title !== null) {
                echo $this->title;
            } else {
                echo \yii\helpers\Inflector::camel2words(\yii\helpers\Inflector::id2camel($this->context->module->id));
                echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
            }
            ?>
        </h1>
        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        )
        ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; MACKPHILISA COMPUTER SYSTEMS LTD <?= date('Y') ?></p>


        </div>
    </footer>

</aside>