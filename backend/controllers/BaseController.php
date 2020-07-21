<?php


namespace backend\controllers;


use yii\web\Controller;

class BaseController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}