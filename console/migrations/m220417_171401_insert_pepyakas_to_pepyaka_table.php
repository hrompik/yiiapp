<?php

use yii\db\Migration;

/**
 * Class m220417_171401_insert_pepyakas_to_pepyaka_table
 */
class m220417_171401_insert_pepyakas_to_pepyaka_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for ($i = 1; $i <= 10 ; $i++) {
            for ($j = 1; $j < 2**$i; $j++){
                $this->insert('pepyaka', ['user_id' => $i, 'info' => md5(time() . $i. $j)]);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220417_133102_insert_pepyakas_to_pepyaka_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220417_133102_insert_pepyakas_to_pepyaka_table cannot be reverted.\n";

        return false;
    }
    */
}
