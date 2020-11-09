<?php


namespace app\components\user;


use app\models\User;
use yii\base\Action;

class LogoutAction extends Action
{


    public function run($token=''){


        $user=User::findIdentityByAccessToken($token);

        if(!empty($token)){
           if(!empty($user)){
               $user->access_token=NULL;
               if($user->save()) {
                   return $user->access_token;
               }else{
                   return $user->getErrors();
               }
           }else{
               return 'USER NOT FOUND';
           }
       }else{
           return 'ACCESS DENIED';
       }


    }
}