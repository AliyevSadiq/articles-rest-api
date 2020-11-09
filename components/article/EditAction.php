<?php


namespace app\components\article;


use app\models\Article;

use app\models\User;

use yii\base\Action;

class EditAction extends Action
{
    public function run($token='',$id=0){
        if(!empty($token)){
          $user=  User::findIdentityByAccessToken(trim($token));

            if(!empty($user)){
                 if(!empty($id)){
                     $article= Article::find()->asArray()->
                     where(['user_id'=>$user['id']])->
                     where(['id'=>$id])->all();
                     if(!empty($article)){
                         return $article;
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