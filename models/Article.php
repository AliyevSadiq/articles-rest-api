<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $big_image
 * @property string $description
 * @property string $article_seo_description
 * @property string $article_seo_keywords
 * @property int $category_id
 * @property int $user_id
 * @property int|null $article_status
 */
class Article extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }







    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'article_seo_description', 'article_seo_keywords', 'category_id', 'user_id'], 'required'],
            [['description'], 'string'],
            [['category_id', 'user_id', 'article_status'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['image', 'article_seo_description', 'article_seo_keywords'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['article_seo_description'], 'unique'],
            [['article_seo_keywords'], 'unique'],
            [["image"],'default', 'value' => "https://picsum.photos/seed/picsum/150/150"],
            [["big_image"],'default', 'value' => "https://picsum.photos/seed/picsum/400/600"],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'big_image' => 'BigImage',
            'description' => 'Description',
            'article_seo_description' => 'Article Seo Description',
            'article_seo_keywords' => 'Article Seo Keywords',
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
            'article_status' => 'Article Status',
        ];
    }


    public function getCategory(){
        return $this->hasOne(Category::class,['id'=>'category_id'])
            ->select(['id','name']);
    }
    public function getUser(){
        return $this->hasOne(User::class,['id'=>'user_id'])
            ->select(['id','username']);
    }








}
