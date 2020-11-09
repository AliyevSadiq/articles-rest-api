<?php


namespace app\controllers;




class UserController extends MainController
{



    public function actions()
    {
        \Yii::$app->response->headers->add('Access-Control-Allow-Origin','*');
        return [
            'sign'=>'app\components\user\SignAction',
            'login'=>'app\components\user\LoginAction',
            'auth'=>'app\components\user\AuthAction',
            'profile'=>'app\components\user\ProfileAction',
            'profile-edit'=>'app\components\user\ProfileEditAction',
            'logout'=>'app\components\user\LogoutAction',
        ];
    }


}