<?php

use yii\db\Migration;

/**
 * Class m201107_091720_article
 */
class m201107_091720_article extends Migration
{
//    /**
//     * {@inheritdoc}
//     */
//    public function safeUp()
//    {
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m201107_091720_article cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('article',[
           'id'=>$this->primaryKey(),
           'title'=>$this->string(50)->notNull()->unique(),
           'image'=>$this->string(255)->notNull(),
           'description'=>$this->text()->notNull(),
           'article_seo_description'=>$this->string(255)->notNull()->unique(),
           'article_seo_keywords'=>$this->string(255)->notNull()->unique(),
           'category_id'=>$this->integer()->notNull(),
            'user_id'=>$this->integer()->notNull(),
           'article_status'=>$this->integer()->defaultValue(0)
        ]);
        $this->createIndex('idx-article_title','article','title');

        $this->createIndex('idx-article-category_id','article','category_id');
        $this->createIndex('idx-article-user_id','article','user_id');

//        $this->addForeignKey(
//            'fk-article-category_id',
//            'article',
//            'category_id',
//        'category',
//        'id',
//        'CASCADE');
    }

    public function down()
    {
        echo "m201107_091720_article cannot be reverted.\n";
         $this->dropTable('article');
        return false;
    }

}
