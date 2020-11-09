<?php

use yii\db\Migration;

/**
 * Class m201107_091658_category
 */
class m201107_091658_category extends Migration
{
//    /**
//     * {@inheritdoc}
//     */
//    public function safeUp()
//    {
//
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m201107_091658_category cannot be reverted.\n";
//
//        return false;
//    }






    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
      $this->createTable('category',[
          'id'=>$this->primaryKey(),
          'name'=>$this->string(50)->notNull()->unique(),
          'seo_description'=>$this->string(250)->notNull()->unique(),
          'seo_keywords'=>$this->string(250)->notNull()->unique(),
          'user_id'=>$this->integer()->notNull(),
          'status'=>$this->integer()->defaultValue(0)
      ]);
      $this->createIndex(
        'idx-category_name',
        'category',
        'name'
      );
        $this->createIndex(
            'idx-user_id',
            'category',
            'user_id'
        );
    }

    public function down()
    {
        //echo "m201107_091658_category cannot be reverted.\n";
        $this->dropTable('category');
        return false;
    }

}
