<?php

namespace app\controllers;

use app\models\Coordinates;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function actionIndex(){
        $model = Coordinates::find()->one();
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
