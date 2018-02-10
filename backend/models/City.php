<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Region;
use app\models\Country;

class City extends ActiveRecord
{

	public static function TableName()
	{
		return 'cities';
	}

	public function rules()
	{		
		return [
			['id', 'safe'],
            ['name', 'safe'],
            [['name','region_id','country_id'], 'required'],
			['name', 'string'],
			['region_id', 'integer'],
			['country_id', 'integer'],
			[['name','region_id','country_id'], 'unique', 'targetAttribute' => ['name','region_id','country_id'], 'message'=>'Такой город в указанном регионе уже существует'],
			['region_id', 'validateRegion'],
			['country_id', 'validateCountry'],
		];
	}

	public function validateRegion($attribute, $params)
    {
        $regions = Region::find()->select('id')->asArray()->all();
        $region_ids = array();
        foreach ($regions as $region) {
        	$region_ids[] = $region['id'];
        }
        if (!in_array($this->$attribute, $region_ids)) {
            $this->addError($attribute, 'Региона с таким id нет');
        }
    }

    public function validateCountry($attribute, $params)
    {
        $countries = Country::find()->select('id')->asArray()->all();
        $countries_ids = array();
        foreach ($countries as $country) {
        	$countries_ids[] = $country['id'];
        }
        if (!in_array($this->$attribute, $countries_ids)) {
            $this->addError($attribute, 'Страны с таким id нет');
        }
    }

	public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

}