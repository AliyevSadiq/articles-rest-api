<?php


namespace app\components\article;


use app\models\Article;
use app\models\User;
use yii\base\Action;

class SelectedAction extends Action
{
    public function run($token=''){
        if(!empty($token)){
          $user=  User::findIdentityByAccessToken(trim($token));

            if(!empty($user)){
            return Article::find()->asArray()->with(['category','user'])->where(['user_id'=>$user['id']])->all();
            }else{
                return 'USER NOT FOUND';
            }
        }else{
            return 'ACCESS DENIED';
        }



    }

}