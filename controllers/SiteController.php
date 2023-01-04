<?php

namespace app\controllers;

use app\models\Film;
use app\models\FilmSearch;
use app\models\SignupForm;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use Yii;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login', 'signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //$id_f = Film::find()->orderBy(['id_film' => SORT_DESC])->offset(1)->all();
        //!!!!!  добавил  $films = Film::find()->all(); и ['films' => $films]
        $films = Film::find()->orderBy(['id_film' => SORT_DESC])->limit(3)->offset(0)->all();
        return $this->render('index', ['films' => $films]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    /**
     * Форма регистрации.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRole()
    {
//        $admin = Yii::$app->authManager->createRole('admin');
//        $admin->description = 'Админ';
//        Yii::$app->authManager->add($admin);
//
//        $role = Yii::$app->authManager->createRole('user');
//        $role->description = 'Юзер';
//        Yii::$app->authManager->add($role);

//        $permit = Yii::$app->authManager->createPermission('deleteFilms');
//        $permit->description = 'Право удалять фильмы, актеры и категории';
//        Yii::$app->authManager->add($permit);

//        $role = Yii::$app->authManager->getRole('admin');
//        $permit = Yii::$app->authManager->getPermission('deleteFilms');
//        Yii::$app->authManager->addChild($role, $permit);

//        $userRole = Yii::$app->authManager->getRole('admin');
//        Yii::$app->authManager->assign($userRole, 1);

//        $userRole = Yii::$app->authManager->getRole('user');
//        Yii::$app->authManager->assign($userRole, 3);


        return 123;
    }


}
