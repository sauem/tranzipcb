<?php

use yii\db\Migration;

/**
 * Class m200816_124225_add_column_key
 */
class m200816_124225_add_column_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("propites", "pKey", $this->string(255)->unique());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200816_124225_add_column_key cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200816_124225_add_column_key cannot be reverted.\n";

        return false;
    }
    */
}
