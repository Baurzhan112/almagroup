<?php

namespace app\models;

use yii\db\ActiveRecord;

class Region extends ActiveRecord
{

	public static function TableName()
	{
		return 'regions';
	}

	/*public function rules()
	{
		return [
			['count', 'number', 'min' => 0],
		];
	}*/
}