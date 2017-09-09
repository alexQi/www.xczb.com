<?php

namespace backend\modules\activity\controllers;


use Yii;
use common\models\ActivityAdvert;
use backend\models\ActivityBaseSearch;
use backend\models\ActivityAdvertSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * AdvertController implements the CRUD actions for ActivityAdvert model.
 */
class AdvertController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ActivityAdvert models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActivityAdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ActivityAdvert model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ActivityAdvert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $activityList = ActivityBaseSearch::find()->select('id,title')->all();
        $model = new ActivityAdvert();

        $p1 = $p2 = '';

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id    = yii::$app->user->identity->getId();
            $model->created_at = time();
            $model->updated_at = time();
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'activityList' => $activityList,
                'p1' => $p1,
                'p2' => $p2
            ]);
        }
    }

    /**
     * Updates an existing ActivityAdvert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $activityList = ActivityBaseSearch::find()->select('id,title')->all();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id    = yii::$app->user->identity->getId();
            $model->updated_at = time();
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'activityList' => $activityList
            ]);
        }
    }

    /**
     * Deletes an existing ActivityAdvert model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ActivityAdvert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ActivityAdvert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ActivityAdvert::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
