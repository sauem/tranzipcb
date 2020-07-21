<?php

namespace backend\controllers;

use common\models\PropitesItems;
use Yii;
use common\models\Propites;
use common\models\PropitesSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PropitesController implements the CRUD actions for Propites model.
 */
class PropitesController extends BaseController
{

    public function actionIndex($id = null)
    {
        $searchModel = new PropitesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new Propites;
        if($id){
            $model =  $this->findModel($id);
        }
        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())){
            if($model->save()){
                return  $this->refresh();
            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'model' => $model
        ]);
    }

    /**
     * Displays a single Propites model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $item = null)
    {
        $parent = $this->findModel($id);

        $model = new PropitesItems;
        if($item){
            $model = PropitesItems::findOne($item);
        }
        if (!$parent){
            throw  new NotFoundHttpException("Thuộc tính không tồn tại");
        }

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())){
            if($model->save()){
                $this->refresh();
            }
        }
        $dataProvider = new ActiveDataProvider([
            'query' => PropitesItems::find()->where(['parent' => $id]),
            'pagination' => [
                'pageSize' => 20
            ]
        ]);
        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'parent' => $parent,
        ]);
    }

    /**
     * Creates a new Propites model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Propites();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Propites model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Propites model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Propites model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Propites the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Propites::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
