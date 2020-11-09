<?php


namespace app\controllers;


class ArticleController extends MainController
{

    public function actions()
    {
        \Yii::$app->response->headers->add('Access-Control-Allow-Origin','*');
        return [
            'index'=>'app\components\article\IndexAction',
            'view'=>'app\components\article\ViewAction',
            'category'=>'app\components\article\CategoryAction',
            'create'=>'app\components\article\CreateAction',
            'selected'=>'app\components\article\SelectedAction',
            'edit'=>'app\components\article\EditAction',
            'update'=>'app\components\article\UpdateAction',
            'delete'=>'app\components\article\DeleteAction',
        ];
    }


}