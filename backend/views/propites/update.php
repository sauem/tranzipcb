<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Propites */

$this->title = 'Update Propites: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Propites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="propites-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
