<?php


namespace app\components\user;


use app\models\User;
use yii\base\Action;
use yii\web\HttpException;

class AuthAction extends Action
{


    public function run($token){
       if(!empty($token)){
           $user=User::findIdentityByAccessToken($token);
           if(!empty($user)){
               return $user;
           }
       }else{
          throw new HttpException('400','Missing token');
       }
    }
}