<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use common\helper\Helper;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Propites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-5">
        <?php $form = ActiveForm::begin() ?>
        <div class="tile">
            <div class="tile-title">
                Thêm biến thể thuộc tính #<?= $parent->name ?>
            </div>
            <div class="tile-body">
                <?= $form->field($model, 'name')->label('Tên thuộc tính') ?>
                <?= $form->field($model, 'parent')->hiddenInput(['value' => Yii::$app->request->get("id")])->label(false) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'percent')
                            ->label('Phần trăm giá') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'value')
                            ->label('Giá trị hiển thị') ?>
                    </div>
                </div>
                <div class="text-right">
                    <?= Helper::reset(['id' => Yii::$app->request->get('id')]) ?>
                    <?= Html::submitButton("Lưu", ['class' => ' btn btn-success']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
    <div class="col-md-7">
        <div class="tile">
            <div class="tile-title">
                Danh sách biến thể
            </div>
            <div class="tile-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'name',
                        [
                            'attribute' => 'percent',
                            'value' => function ($model) {
                                return $model->percent . "%";
                            }
                        ],
                        [
                            'label' => 'Giá trị hiển thị',
                            'attribute' => 'value',
                            'value' => function ($model) {
                                return $model->value;
                            }
                        ],
                        [
                            'class' => ActionColumn::class,
                            'template' => '{update}{delete}',
                            'buttons' => [
                                'update' => function ($url, $model) {
                                    $url = \yii\helpers\Url::toRoute(['view', 'id' => Yii::$app->request->get("id"), 'item' => $model->id]);
                                    return Helper::update($url);
                                },
                                'delete' => function ($url, $model) {
                                    return Helper::delete($url);
                                },
                            ]
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>