<?php


namespace app\components\category;


use app\models\Category;
use app\models\User;
use Yii;
use yii\base\Action;

class EditAction extends Action
{
    public function run($token='',$id=0){
        if(!empty($token)){
          $user=  User::findIdentityByAccessToken(trim($token));

            if(!empty($user)){
                 if(!empty($id)){
                     $category= Category::find()->asArray()->
                     where(['user_id'=>$user['id']])->
                     where(['id'=>$id])->all();
                     if(!empty($category)){
                         return $category;
                     }else{
                          return false;
                     }
                 }else{
                     return false;
                 }
            }else{
                return 'USER NOT FOUND';
            }
        }else{
            return 'ACCESS DENIED';
        }



    }

}