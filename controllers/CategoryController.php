<?php


namespace app\controllers;


class CategoryController extends MainController
{
    public function actions()
    {
        \Yii::$app->response->headers->add('Access-Control-Allow-Origin','*');
        return [
            'index'=>'app\components\category\IndexAction',
            'create'=>'app\components\category\CreateAction',
            'selected'=>'app\components\category\SelectedAction',
            'edit'=>'app\components\category\EditAction',
            'update'=>'app\components\category\UpdateAction',
            'delete'=>'app\components\category\DeleteAction',
        ];



    }

}