<?php

namespace common\helper;

use common\models\Propites;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\helpers\Url;

class Helper
{
    static function prinf($var)
    {
        echo "<pre>";
        var_dump($var);
            echo "</pre>";
        exit;
    }

    static function tinymce($form, $model, $name)
    {
        return $form->field($model, $name)->widget(TinyMce::className(), [
            'options' => ['rows' => 6],
            'language' => 'vi',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    }

    static function update($url)
    {
        return Html::a("<i class='fa fa-edit'></i>", $url, ['class' => 'btn bg-white btn-sm']);
    }

    static function view($url)
    {
        return Html::a("<i class='fa fa-eye'></i>", $url, ['class' => 'btn bg-white btn-sm']);
    }

    static function delete($url)
    {
        return Html::a('<i class="fa fa-trash"></i>'
            , $url, [
                'class' => 'btn btn-sm bg-white',
                'data-confirm' => 'Bạn chắc sẽ xóa dữ liệu này?',
                'data-method' => 'post',
                'data-pjax' => 0
            ]);
    }

    static function reset($params = null)
    {
        $url = Url::toRoute(\Yii::$app->controller->getRoute());
        if ($params) {
            $url = Url::toRoute(array_merge([$url], $params));
        }
        return Html::a('Làm mới', $url, ['class' => 'btn btn-outline-warning']);
    }

    static function optionSelect () {
        $lists = Propites::allList();
            $htm = "";
        foreach ($lists as  $list){
            $htm .= "<option>{$list->name}</option>";
        }
        return $htm;
    }

    static function firstError($model)
    {
        $modelErrs = $model->getFirstErrors();
        foreach ($modelErrs as $err) {
            return $err;
        }
        return "No error founded";
    }
}