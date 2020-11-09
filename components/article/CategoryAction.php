<?php


namespace app\components\article;


use app\models\Article;
use app\models\Category;
use yii\base\Action;

class CategoryAction extends Action
{
    public function run($id=0){
       $article=Article::find()->asArray()->where(['article_status'=>1])->
       andWhere(['category_id'=>$id])->all();
       if(!empty($article)){
           return $article;
       }
    }

}