<?php

namespace app\controllers;

use app\models\Archive;
use app\models\Coordinates;
use app\models\CoordinatesArchive;
use app\models\Users;
use yii\web\Controller;
use yii\web\Response;


class SiteController extends Controller
{
    public function actionIndex(){
    }

    public function actionAddCoords($userid,$lat,$lng){
        $exists = Coordinates::find()
            ->where( [ 'user_id' => $userid ] )
            ->exists();

        if ($exists){
            $model = Coordinates::find()->where(['user_id' => $userid])->one();
            $model->lat = $lat;
            $model->lng = $lng;
            $model->save();
        }
        else{
            $model = new Coordinates();
            $model->user_id = $userid;
            $model->lat = $lat;
            $model->lng = $lng;
            $model->insert();
        }
        $archive = new Archive();
        $archive->user_id = $userid;
        $archive->lat = $lat;
        $archive->lng = $lng;
        $archive->insert();
    }

    public function actionGetCoords(){
        $model = Coordinates::find()->orderBy('user_id')->all();
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $model;
    }

    public function actionGetUsers(){
        $model = Users::find()->innerJoin('coordinates','users.id = coordinates.user_id')->orderBy('users.id')->all();
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $model;
    }

    public function actionLogin($login,$pass){
        $model = Users::find()->where(['and' , ['login' => $login] , ['password' => $pass]])->one();

        if ($model){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return $model;
        }
        else{
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return array("user_id"=>0);
        }
    }
    public function actionClear(){
        $model = Coordinates::deleteAll();
    }

    public function actionRegister($login,$password){
        $model = new Users();
        $model->login = $login;
        $model->password = $password;
        $model->insert();
    }
    public function actionGetArchive($userid){
        $model = Archive::find()->where(["user_id"=>$userid])->all();
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $model;
    }
}
