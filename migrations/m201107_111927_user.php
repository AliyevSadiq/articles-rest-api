<?php

use yii\db\Migration;

/**
 * Class m201107_111927_user
 */
class m201107_111927_user extends Migration
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
//        echo "m201107_111927_user cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
          $this->createTable('user',[
           'id'=>$this->primaryKey(),
           'first_name'=>$this->string(40)->notNull(),
           'surname'=>$this->string(40)->notNull(),
           'password'=>$this->string(40)->notNull(),
           'email'=>$this->string(30)->notNull()->unique(),
           'username'=>$this->string(20)->notNull()->unique(),
           'access_token'=>$this->string(20)->notNull()->unique(),
          ]);
    }

    public function down()
    {
        $this->dropTable('user');
        return false;
    }

}
