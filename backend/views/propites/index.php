<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use common\helper\Helper;
use kartik\form\ActiveForm;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;

$this->title = 'Propites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-5">
        <?php $form = ActiveForm::begin() ?>
        <div class="tile">
            <div class="tile-title">
                Thêm thuộc tính
            </div>
            <div class="tile-body">
                <?= $form->field($model, 'name')->label('Tên thuộc tính') ?>
                <?= $form->field($model, 'document_link')->label('Link hướng dẫn') ?>
                <?= Helper::tinymce($form, $model, 'description') ?>
                <div class="text-right">
                    <?= Helper::reset() ?>
                    <?= Html::submitButton("Lưu", ['class' => ' btn btn-success']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
    <div class="col-md-7">
        <div class="tile">
            <div class="tile-title">
                Danh sách thuộc tính
            </div>
            <div class="tile-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'name',
                        'document_link',
                        [
                            'label' => 'Số biến thể',
                            'value' => function($model){
                                return $model->getItems()->count();
                            }
                        ],
                        [
                            'class' => ActionColumn::class,
                            'buttons' => [
                                'view' => function ($url, $model) {
                                    return Helper::view($url);
                                },
                                'update' => function ($url, $model) {
                                    $url = \yii\helpers\Url::toRoute(['index', 'id' => $model->id]);
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