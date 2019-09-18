<?php


namespace app\models;


use yii\base\Model;
use yii\db\ActiveRecord;

class Coordinates extends ActiveRecord
{
    public function rules()
    {
        return [
            ['id','safe'],
            [['lat', 'lng'], 'required'],
        ];
    }
}