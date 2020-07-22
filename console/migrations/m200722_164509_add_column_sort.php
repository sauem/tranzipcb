<?php

use yii\db\Migration;

/**
 * Class m200722_164509_add_column_sort
 */
class m200722_164509_add_column_sort extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("propites","sort", $this->integer()->defaultValue(50));
        $this->addColumn("propites_items","sort", $this->integer()->defaultValue(50));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200722_164509_add_column_sort cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200722_164509_add_column_sort cannot be reverted.\n";

        return false;
    }
    */
}
