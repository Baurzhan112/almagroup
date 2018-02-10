<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\City;
use app\models\Region;
use app\models\Country;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'update'],
                        'allow' => true,
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
        $city_model = new City();
        if (Yii::$app->request->post())
        {            
            $city_model->load(Yii::$app->request->post());
            if ($city_model->validate()) $city_model->save();
            return $this->redirect(['/site/update']);
        }        
        $regions = Region::find()->all();
        $countries = Country::find()->all();
        return $this->render('index',['city_model'=>$city_model,'regions'=>$regions,'countries'=>$countries]);
    }

    public function actionUpdate()
    {        
        $city_model = new City();
        if (Yii::$app->request->post())
        {            
            $city_model->load(Yii::$app->request->post());
            $city = City::find()->where('id='.$city_model->id)->limit(1)->one();
            $city->load(Yii::$app->request->post());
            if ($city->validate()) $city->save();
        }
        $cities = City::find()->with('region','country')->all();
        $regions = Region::find()->all();
        $countries = Country::find()->all();
        return $this->render('cities',['cities'=>$cities,'city_model'=>$city_model,'regions'=>$regions,'countries'=>$countries]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
