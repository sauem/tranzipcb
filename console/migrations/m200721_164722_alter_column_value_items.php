<?php

use yii\db\Migration;

/**
 * Class m200721_164722_alter_column_value_items
 */
class m200721_164722_alter_column_value_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn("propites_items","value" , $this->string(255)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200721_164722_alter_column_value_items cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200721_164722_alter_column_value_items cannot be reverted.\n";

        return false;
    }
    */
}
