<?php

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }




    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

   public function actionGenerateCategory(){
     $count=Category::find()->count();

     $items=[];

     for($i=$count+1;$i<=$count+5;$i++){
         $category_name='Cateogry Item'.$i;
         $category_seo_description='Cateogry Item seo_description'.$i;
         $category_seo_keywords='Cateogry Item seo_keywords'.$i;
         $user_id=1;
         $status=1;
         $items[]=[
             'name'=>$category_name,
             'seo_description'=>$category_seo_description,
             'seo_keywords'=>$category_seo_keywords,
             'user_id'=>$user_id,
             'status'=>$status,
         ];
     }

     Yii::$app->db->createCommand()->batchInsert('category',
     ['name','seo_description','seo_keywords','user_id','status'], $items)->execute();
   }

   public function actionGenerateArticle(){
        $article_count=Article::find()->count();
        $items=[];
        $category_count=Category::find()->count();
        $j=0;
        for($i=$article_count+1;$i<=$article_count+20;$i++){
            $article_title='Article Item'.$i;
            $article_description='Article Item description'.$i;
            $article_article_seo_description='Article Item article_seo_description'.$i;
            $article_article_article_seo_keywords ='Article Item article_seo_keywords'.$i;
            $user_id=1;
            $status=1;

            if($j<$category_count){
                $j++;
            }else{
                $j=1;
            }


            $items[]=[
               'title'=> $article_title,
               'description'=> $article_description,
               'article_seo_description'=> $article_article_seo_description,
               'article_seo_keywords'=> $article_article_article_seo_keywords,
               'user_id'=> $user_id,
               'article_status'=> $status,
                'category_id'=>$j
            ];

        }



       Yii::$app->db->createCommand()->batchInsert('article',
           ['title','description','article_seo_description','article_seo_keywords',
               'user_id','article_status','category_id'], $items)->execute();


   }






}
