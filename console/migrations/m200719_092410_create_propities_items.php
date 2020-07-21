<?php

use yii\db\Migration;

/**
 * Class m200719_092410_create_propities_items
 */
class m200719_092410_create_propities_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%propites_items}}', [
            'id' => $this->primaryKey(),
            'parent' => $this->integer(),
            'name' => $this->string(255)->notNull(),
            'percent' => $this->double(15.2)->defaultValue(0),
            'value' => $this->double()->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey("item_fk_propitie",
        'propites_items',
        'parent',
        'propites',
        'id',
        'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("propites_items");
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200719_092410_create_propities_items cannot be reverted.\n";

        return false;
    }
    */
}
