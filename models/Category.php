<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_description
 * @property string $seo_keywords
 * @property int $user_id
 * @property int|null $status
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'seo_description', 'seo_keywords', 'user_id'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['seo_description', 'seo_keywords'], 'string', 'max' => 250],
            [['name'], 'unique'],
            [['seo_description'], 'unique'],
            [['seo_keywords'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'seo_description' => 'Seo Description',
            'seo_keywords' => 'Seo Keywords',
            'user_id' => 'User ID',
            'status' => 'Status',
        ];
    }
    public function getUser(){
        return $this->hasOne(User::class,['id'=>'user_id'])
            ->select(['id','username']);
    }
}
