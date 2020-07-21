<?php
namespace frontend\controllers;

use common\models\UploadForm;
use yii\web\Controller;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $model = new UploadForm;

        return $this->render('index',[
            'model' => $model
        ]);
    }


}
