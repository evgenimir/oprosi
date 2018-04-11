<?php

use yii\db\Migration;

/**
 * Handles the creation of table `polls_questions`.
 */
class m180410_164409_create_polls_questions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('polls_questions', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'polls_id' => $this->integer(10),
        ]);

        // creates index for column `polls_id`
        $this->createIndex(
            'idx-polls_questions-polls_id',
            'polls_questions',
            'polls_id'
        );

        // add foreign key for table `polls`
        $this->addForeignKey(
            'fk-polls_questions-polls_id',
            'polls_questions',
            'polls_id',
            'polls',
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
            'fk-polls_questions-polls',
            'polls'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-polls_questions-polls',
            'polls'
        );

        $this->dropTable('polls_questions');
    }

}
