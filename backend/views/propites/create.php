<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Propites */

$this->title = 'Create Propites';
$this->params['breadcrumbs'][] = ['label' => 'Propites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propites-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
