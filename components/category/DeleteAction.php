<?php


namespace app\components\category;


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
                     $category= Category::findOne($id);
                     if(!empty($category)){

                         return $category->delete();
                     }else{
                          return 'CATEGORY NOT FOUND';
                     }
                 }else{
                     return 'CATEGORY ID IS EMPTY';
                 }
            }else{
                return 'USER NOT FOUND';
            }
        }else{
            return 'ACCESS DENIED';
        }



    }

}