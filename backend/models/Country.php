<?php

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{

	public static function TableName()
	{
		return 'countries';
	}

	/*public function rules()
	{
		return [
			['count', 'number', 'min' => 0],
		];
	}*/
}