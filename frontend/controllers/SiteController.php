<?php
namespace frontend\controllers;

use common\helper\Gerber;
use common\models\UploadForm;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        $model = new UploadForm;

        return $this->render('index',[
            'model' => $model
        ]);
    }

    public function actionDemo(){
        $demo = new Gerber(\Yii::getAlias("@gerber"));
        return $demo->example();
    }


}
