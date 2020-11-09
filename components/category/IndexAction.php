<?php


namespace app\components\category;


use app\models\Category;
use yii\base\Action;

class IndexAction extends Action
{
    public function run(){
        return Category::find()->select(['id','name'])->asArray()->where(['status'=>1])->all();
    }

}