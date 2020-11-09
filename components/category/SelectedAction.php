<?php


namespace app\components\category;


use app\models\Category;
use app\models\User;
use Yii;
use yii\base\Action;

class SelectedAction extends Action
{
    public function run($token=''){
        if(!empty($token)){
          $user=  User::findIdentityByAccessToken(trim($token));

            if(!empty($user)){
            return Category::find()->asArray()->with('user')->where(['user_id'=>$user['id']])->all();
            }else{
                return 'USER NOT FOUND';
            }
        }else{
            return 'ACCESS DENIED';
        }



    }

}