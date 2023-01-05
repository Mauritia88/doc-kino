<?php

namespace app\controllers;

use app\models\Actors;
use app\models\CommentForm;
use app\models\Film;
use app\models\FilmSearch;
use app\models\ImageUpload;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * FilmController implements the CRUD actions for Film model.
 */
class FilmController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index', 'update', 'create', 'delete',],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['index', 'update', 'create', 'delete'],
                            'roles' => ['admin'],
                        ],
//                        [
//                            'actions' => ['view', 'index_list', 'index-search', 'comment'],
//                            'allow' => true,
//                            'roles' => ['?', '@'],
//                        ],

                    ],
                ],

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
     * Lists all Film models.
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new FilmSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($searchModel->load(Yii::$app->request->get())) {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }


//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }

    public function actionIndex_list()
    {
        $searchModel = new FilmSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($searchModel->load(Yii::$app->request->get())) {
            return $this->render('index_list', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('index_list', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }


    /**
     * Displays a single Film model.
     * @param int $id_film Id Film
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \yii\base\InvalidConfigException
     */
    public function actionView($id_film)
    {
        $actor = $this->findModel($id_film);
        $movieDataProvider = new ArrayDataProvider([
                'allModels' => $actor->getActfilms()->all(),
            ]
        );

        $comments = $actor->getFilmComments();
        $commentForm = new CommentForm();

        return $this->render('view', [
            'model' => $actor,
            'movieDataProvider' => $movieDataProvider,
            'comments' => $comments,
            'commentForm' => $commentForm,
        ]);
    }

    /**
     * Creates a new Film model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Film();
        $upload = new ImageUpload;
//        $file = $upload->image;

        if ($this->request->isPost) {

            $model->load($this->request->post());
            // $file = uploadedFile::getInstance($model, 'image');
            if ($file = uploadedFile::getInstance($model, 'image')) {
                $model->saveImage($upload->uploadFile($file, $model->image));
            }
            //$model->saveImage($upload->uploadFile($file, $model->image));
            $model->save(false);
            return $this->redirect(['view', 'id_film' => $model->id_film]);

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Film model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_film Id Film
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_film)
    {
        $model = $this->findModel($id_film);
        $upload = new ImageUpload;
//        $file = $upload->image;

        if ($this->request->isPost) {

            $model->load($this->request->post());
//            $file = uploadedFile::getInstance($model, 'image');
//            $model->saveImage($upload->uploadFile($file, $model->image));
            if ($file = uploadedFile::getInstance($model, 'image')) {
                $model->saveImage($upload->uploadFile($file, $model->image));
            }
            $model->save(false);
            return $this->redirect(['view', 'id_film' => $model->id_film]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Film model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_film Id Film
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_film)
    {
        $this->findModel($id_film)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Film model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_film Id Film
     * @return Film the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_film)
    {
        if (($model = Film::findOne(['id_film' => $id_film])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionIndexSearch()
    {
        $searchModel = new FilmSearch();
        $sea = Yii::$app->request->get('sh-search');
        $sea = str_replace(' ', '', $sea);
        $query = Film::find()->where(['like', 'title', $sea]);
        $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => ['pageSize' => 3],
            ]
        );
        if ($sea != null && !empty($sea)) {
            return $this->render('index_search', compact('dataProvider', 'sea'));
        } else {
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('index_list', ['searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->saveComment($id)) {
                Yii::$app->getSession()->setFlash('comment', 'Your comment will be added soon!');
                return $this->redirect(['film/view', 'id_film' => $id]);
            }
        }
    }
}
