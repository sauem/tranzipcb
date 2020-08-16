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
    <div class="col-md-7">
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
                    <div class="col-md-2">
                        <?= $form->field($model, 'sort')->label('Vị trí') ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'pKey')->label('Định danh công thức') ?>
                    </div>
                    <div class="col-12">
                        <?= Helper::tinymce($form, $model, 'description') ?>
                        <?= Helper::tinymce($form, $model, 'alert_comfirm') ?>
                    </div>
                    <div class="col-md-12">
                        <label>

                            <input type="checkbox" class="logic" data-toggle="switchbutton" data-size="xs" data-style="ios">
                            Đặt logic hiển thị
                        </label>
                    </div>
                    <div class="col-md-12" id="expand">
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control" name="related">
                                    <option>Chọn thuộc tính</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="rule">
                                    <option>Có bất kì giá trị</option>
                                </select>
                            </div>
                            <div class="col-md-4 text-right">
                                <input class="form-control" name="match" placeholder="trùng với giá trị" disabled>
                                <button type="button" class="btn btn-xs btn-success">And</button>
                            </div>
                            <p class="col-12">Or</p>
                        </div>

                        <button  type="button" class="btn btn-sm mt-4 btn-outline-danger">Thêm điều kiện</button>
                    </div>
                </div>


                <div class="text-right">
                    <?= Helper::reset() ?>
                    <?= Html::submitButton("Lưu", ['class' => ' btn btn-success']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
    <div class="col-md-5">
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
                        'sort',
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