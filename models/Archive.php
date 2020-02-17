<?php


namespace app\models;


use yii\db\ActiveRecord;

class Archive extends ActiveRecord
{
    public function rules()
    {
        return [
            ['id','safe'],
            [['lat', 'lng'], 'required'],
        ];
    }
}