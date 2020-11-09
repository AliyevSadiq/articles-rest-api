<?php


namespace app\components\category;


use app\models\Category;
use app\models\User;
use Yii;
use yii\base\Action;

class CreateAction extends Action
{
    public function run($token=''){
        if(!empty($token)){
          $user=  User::findIdentityByAccessToken(trim($token));

            if(!empty($user)){
                $category=new Category();
                if(Yii::$app->request->isPost){
                    $category->name=\Yii::$app->request->post('name');
                    $category->seo_description=\Yii::$app->request->post('seo_description');
                    $category->seo_keywords =\Yii::$app->request->post('seo_keywords');
                    $category->user_id =$user['id'];
                    $category->status =1;
                    if($category->validate() && $category->save()){
                        return true;
                    }else{
                        return false;
                    }
                }
            }else{
                return 'USER NOT FOUND';
            }


        }else{
            return 'ACCESS DENIED';
        }



    }

}