<?php

namespace app\controllers;

use app\models\Coordinates;
use yii\web\Controller;



class SiteController extends Controller
{
    public function actionIndex(){
        $model = Coordinates::find()->orderBy('id DESC')->limit(1)->one();
        return $this->render('index',[
            'model' => $model
        ]);
    }
    public function actionAddCoord($lat,$lng){
        $model = new Coordinates();
        $model->lat = $lat;
        $model->lng = $lng;
        $model->insert();
    }
}
