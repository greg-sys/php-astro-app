<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Planets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the Planets page. You may modify the following file to customize its content:
    </p>
    <code><?= __FILE__ ?></code><br><br>

    <?= Html::encode($responsestring) ?><br><br>
    <?= $testfile ?>


</div>