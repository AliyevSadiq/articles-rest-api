<?php


namespace app\components\article;


use app\models\Article;

use yii\base\Action;

class IndexAction extends Action
{
    public function run(){
        return Article::find()->select(['id','title','image','description'])->
        asArray()->where(['article_status'=>1])->all();
    }

}