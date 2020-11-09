<?php


namespace app\components\user;


use app\models\User;
use yii\base\Action;
use yii\web\HttpException;

class ProfileEditAction extends Action
{


    public function run($token=''){
        $user=User::findIdentityByAccessToken($token);
       if(!empty($token)){
           if(!empty($user)){
               if(\Yii::$app->request->isPost){
                   $user->first_name=\Yii::$app->request->post('first_name');
                   $user->surname=\Yii::$app->request->post('surname');
                   $user->email=\Yii::$app->request->post('email');
                   $user->username=\Yii::$app->request->post('username');
                   $user->password=\Yii::$app->getSecurity()
                       ->generatePasswordHash(\Yii::$app->request->post('password'));

                   if($user->validate() && $user->save()){
                       return true;
                   }else{
                      return false;
                   }
               }
           }else{
               return 'USER NOT FOUND';
           }
       }else{
           return 'ACCESS DENIED';
       }


    }
}