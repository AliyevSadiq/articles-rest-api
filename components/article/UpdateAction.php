<?php


namespace app\components\article;


use app\models\Article;

use app\models\User;
use Yii;
use yii\base\Action;

class UpdateAction extends Action
{
    public function run($token='',$id=0){
        if(!empty($token)){
          $user=  User::findIdentityByAccessToken(trim($token));

            if(!empty($user)){
                 if(!empty($id)){
                     $article= Article::findOne($id);
                     if(!empty($article)){

                         if(Yii::$app->request->isPost){
                             $article->title=\Yii::$app->request->post('title');
                             $article->description=\Yii::$app->request->post('description');

                             $article->image=\Yii::$app->request->post('image');
                             $article->big_image=\Yii::$app->request->post('big_image');

                             $article->article_seo_description=\Yii::$app->request->post('article_seo_description');
                             $article->article_seo_keywords =\Yii::$app->request->post('article_seo_keywords');
                             $article->category_id =\Yii::$app->request->post('category_id');
                             $article->user_id =$user['id'];
                             $article->article_status =\Yii::$app->request->post('article_status');
                             if($article->validate()  && $article->save()){
                                 return true;
                             }else{
                                 return false;
                             }
                         }
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