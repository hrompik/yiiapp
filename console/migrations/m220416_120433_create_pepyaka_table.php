<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pepyaka}}`.
 */
class m220416_120433_create_pepyaka_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pepyaka}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'info' => $this->string()
        ]);

        // create index for colum `user_id`
        $this->createIndex(
            'idx-pepyaka-user_id',
            'pepyaka',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-pepyaka-user_id',
            'pepyaka',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-pepyaka-user_id',
            'pepyaka'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-pepyaka-user_id',
            'pepyaka'
        );

        $this->dropTable('{{%pepyaka}}');
    }
}
