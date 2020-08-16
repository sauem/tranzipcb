<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use common\helper\Helper;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use common\models\PropitesItems;
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Propites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-7">
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
                    <div class="col-md-6">
                        <?= $form->field($model, 'input_customize')
                            ->dropDownList(PropitesItems::INPUT_CUSTOM)
                            ->label('Ô nhập tùy chỉnh') ?>
                    </div>

                    <div class="col-md-12">
                       <label>
                           <input type="checkbox" class="logic" data-toggle="switchbutton" data-size="xs" data-style="ios">
                           Đặt logic hiển thị
                       </label>
                    </div>
                    <div class="col-12" style="display: none" id="expand">
                        <div class="row item">
                            <div class="col-md-4">
                                <select class="form-control" name="related">
                                    <option>Chọn thuộc tính</option>
                                    <?= Helper::optionSelect()?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="rule">
                                    <option value="any">Có bất kì giá trị</option>
                                    <option value="include">Bao gồm</option>
                                    <option value="exclude">Ngoại trừ</option>
                                </select>
                            </div>
                            <div class="col-md-4 text-right">
                               <input class="form-control" name="match" placeholder="trùng với giá trị" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-5">
                    <?= Helper::reset(['id' => Yii::$app->request->get('id')]) ?>
                    <?= Html::submitButton("Lưu", ['class' => ' btn btn-success']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
    <div class="col-md-5">
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
                                return $model->percent > 100 ? $model->percent . "đ" : $model->percent . "%";
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
<?php
$js =<<<JS
    $(".logic").change(function() {
        if($(this).is(":checked")){
            $("#expand").show();
        }else{
            $("#expand").hide();    
        }
    });
    $(".btnOr").click(function() {
        alert("adsa")
    });
JS;
$this->registerJs($js);