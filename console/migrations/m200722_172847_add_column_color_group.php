<?php

use yii\db\Migration;

/**
 * Class m200722_172847_add_column_color_group
 */
class m200722_172847_add_column_color_group extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("propites","color_group", $this->integer()->null());
        $this->addColumn("propites","alert_comfirm", $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200722_172847_add_column_color_group cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200722_172847_add_column_color_group cannot be reverted.\n";

        return false;
    }
    */
}
