<?php

namespace app\modules\movie\controllers;


use app\modules\movie\models\Actors;
use app\modules\movie\models\ActorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActorsController implements the CRUD actions for Actors model.
 */
class ActorsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Actors models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ActorsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Actors model.
     * @param int $id_actor Id Actor
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_actor)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_actor),
        ]);
    }

    /**
     * Creates a new Actors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Actors();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_actor' => $model->id_actor]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Actors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_actor Id Actor
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_actor)
    {
        $model = $this->findModel($id_actor);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_actor' => $model->id_actor]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Actors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_actor Id Actor
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_actor)
    {
        $this->findModel($id_actor)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Actors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_actor Id Actor
     * @return Actors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_actor)
    {
        if (($model = Actors::findOne(['id_actor' => $id_actor])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
