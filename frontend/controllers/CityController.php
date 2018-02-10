<?php
namespace frontend\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
use app\models\City;
use app\models\Region;

class CityController extends ActiveController
{
    public $modelClass = 'app\models\City';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['class'] = HttpBearerAuth::className();
        $behaviors['authenticator']['only'] = ['update','create'];
        return $behaviors;
    }

    public function actions(){
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['view']);
        unset($actions['index']);
        return $actions;
    }

    protected function verbs(){
        return [
            'create' => ['POST'],
            'update' => ['PUT'],
            'index'=>['GET'],
        ];
    }

    public function actionIndex()
    {
        return (new \yii\db\Query())
            ->select('C.id as id, C.name as city, R.name as region, CT.name as country')
            ->from('cities C, regions R, countries CT')
            ->where('C.region_id = R.id and C.country_id = CT.id')
            ->all();
    }

    public function actionCreate()
    {
        $model = new $this->modelClass();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->validate()) 
        {
            $model->save();
            $result = 'Город '.$model->name.' успешно добавлен!';
        }
        else 
        {
            $result = $model->getErrors();
        }
        return $result;
    }

    public function actionUpdate()
    {
        if (Yii::$app->request->post('city_id'))
        {
            $city_id = Yii::$app->request->post('city_id');
            $model = City::findOne(['id' => $city_id]);
            if ($model)
            {
                $model->load(Yii::$app->getRequest()->getBodyParams(), '');
                if ($model->validate()) 
                {
                    $dirty_attrs = $model->getDirtyAttributes();
                    if (!empty($dirty_attrs))
                    {
                        $model->save();
                        $result = 'Город '.$model->name.' успешно изменен!';
                    }
                    else $result = 'Нет новых изменений!';
                }
                else 
                {
                    $result = $model->getErrors();
                }
            }
            else $result = 'Города с id: '.$city_id.' не существует!';
        }
        else $result = 'Не передан параметр "city_id"';
        return $result;
    }
}