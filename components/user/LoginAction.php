<?php


namespace app\components\user;


use app\models\LoginForm;
use app\models\User;
use yii\base\Action;

class LoginAction extends Action
{
  public function run(){
      $model=new LoginForm();
      if(\Yii::$app->request->isPost){

          $model->username=\Yii::$app->request->post('username');
          $model->password=\Yii::$app->request->post('password');
          if($model->login()){
              $user=User::findOne($model->getUser()->id);

              if(empty($user->access_token)) {

                  $token = substr(\Yii::$app->getSecurity()->generateRandomString(), 0, 20);
                  $user->access_token = $token;
                  if ($user->save()) {
                      return $user->access_token;
                  }else{
                      return $user->getErrors();
                  }
              }else{

                  return $user->access_token;
              }
          }
      }
  }



}