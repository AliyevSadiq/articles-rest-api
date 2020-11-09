<?php

namespace app\components\user;
use app\models\User;
use yii\base\Action;

class SignAction extends Action
{

    public function run(){
        $model=new User();
        if(\Yii::$app->request->isPost){
            $model->first_name=\Yii::$app->request->post('first_name');
            $model->surname=\Yii::$app->request->post('surname');
            $model->email=\Yii::$app->request->post('email');
            $model->username=\Yii::$app->request->post('username');


            $model->password=\Yii::$app->getSecurity()
                ->generatePasswordHash(\Yii::$app->request->post('password'));

            if($model->validate() && $model->save()){
                return true;
            }else{

                return false;

            }
        }
    }

}