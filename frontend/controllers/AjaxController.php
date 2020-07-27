<?php


namespace frontend\controllers;


use common\helper\Gerber;
use common\helper\Helper;
use common\models\Propites;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use common\models\UploadForm;

class AjaxController extends Controller
{
    function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        \Yii::$app->response->format = Response::FORMAT_JSON;
    }

    function actionAjaxFile()
    {
        $model = new UploadForm();
        if (\Yii::$app->request->isPost) {
            $model->gerberFile = UploadedFile::getInstance($model, 'gerberFile');
            if ($path = $model->upload()) {

                $gerber = new Gerber(\Yii::getAlias("@gerber"));
                $board = $gerber->checkfiles($path);
                if (!$board) {
                    echo 'Error:';
                    print_r($gerber->error);
                } else {
                    $name = $model->gerberFile->getBaseName();
                    $report = $gerber->sizereport($board);
                    //change color
                    $gerber->createPNG($path, 1);
                    $png = $gerber->imagereport(1);
                }
                return [
                    'success' => 1,
                    'data' => [
                        'images' => $png,
                        'info' => $report
                    ]
                ];
            }
        }
        return [
            'success' => 0,
            'path' => null
        ];
    }

    public function actionLoadPropities(){
        $model = Propites::find()->where(['status' => Propites::_ACTIVE])
            ->orderBy(['sort' => SORT_ASC])
            ->with('items')->asArray()->all();
        return $model;
    }
}