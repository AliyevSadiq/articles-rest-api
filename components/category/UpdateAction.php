<?php


namespace app\components\category;


use app\models\Category;
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
                     $category= Category::findOne($id);
                     if(!empty($category)){

                         if(Yii::$app->request->isPost){
                             $category->name=\Yii::$app->request->post('name');
                             $category->seo_description=\Yii::$app->request->post('seo_description');
                             $category->seo_keywords =\Yii::$app->request->post('seo_keywords');
                             $category->user_id =$user['id'];
                             $category->status =\Yii::$app->request->post('status');
                             if($category->validate() &&  $category->save()){
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