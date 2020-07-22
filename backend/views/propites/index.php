<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use common\helper\Helper;
use kartik\form\ActiveForm;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use common\models\Propites;

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
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'status')
                            ->dropDownList(
                                    Propites::STATUS
                            )
                            ->label('Kích hoạt') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'type')->dropDownList(Propites::TYPES)->label('Loại tùy chọn') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'color_group')->dropDownList(Propites::COLOR)->label('Group màu sắc') ?>
                    </div>
                </div>
                <?= Helper::tinymce($form, $model, 'description') ?>
                <?= Helper::tinymce($form, $model, 'alert_comfirm') ?>
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