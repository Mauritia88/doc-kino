<?php

namespace app\controllers;

use app\models\Category;
use app\models\CategorySearch;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param int $id_category Id Category
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_category)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_category),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_category' => $model->id_category]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_category Id Category
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_category)
    {
        $model = $this->findModel($id_category);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_category' => $model->id_category]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_category Id Category
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_category)
    {
        $this->findModel($id_category)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_category Id Category
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_category)
    {
        if (($model = Category::findOne(['id_category' => $id_category])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionIndexCount()
    {
        $catCounts = Category::find()
            ->select([
                '{{category}}.*', // получить все атрибуты category
                'COUNT({{film}}.id_film) AS count' // вычислить количество заказов
            ])
            ->groupBy('{{category}}.id_category')
            ->joinWith('films', 'id_cat= id_category')
            ->asArray()
            ->all();

        $categoryCountsProvider = new ArrayDataProvider([
            'allModels' => $catCounts,
        ]);

        return $this->render('index-count', [
            'dataProvider' => $categoryCountsProvider,
        ]);
//        SELECT category.name, COUNT(film.id_film) AS count FROM category LEFT JOIN film ON  film.id_cat=category.id_category
//GROUP BY category.id_category
    }

}
