<?php

use yii\db\Migration;

/**
 * Class m200722_035030_add_column_propites
 */
class m200722_035030_add_column_propites extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("propites", "type", $this->string(255)->defaultValue("checkbox"));
        $this->addColumn("propites_items", "input_customize", $this->integer(1)->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200722_035030_add_column_propites cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200722_035030_add_column_propites cannot be reverted.\n";

        return false;
    }
    */
}
