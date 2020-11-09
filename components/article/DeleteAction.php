<?php


namespace app\components\article;


use app\models\Article;
use app\models\Category;
use app\models\User;
use Yii;
use yii\base\Action;

class DeleteAction extends Action
{
    public function run($token='',$id=0){
        if(!empty($token)){
          $user=  User::findIdentityByAccessToken(trim($token));

            if(!empty($user)){
                 if(!empty($id)){
                     $article= Article::findOne($id);
                     if(!empty($article)){

                         return $article->delete();
                     }else{
                          return 'ARTICLE NOT FOUND';
                     }
                 }else{
                     return 'ARTICLE ID IS EMPTY';
                 }
            }else{
                return 'USER NOT FOUND';
            }
        }else{
            return 'ACCESS DENIED';
        }
    }

}