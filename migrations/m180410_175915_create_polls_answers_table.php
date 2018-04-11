<?php

use yii\db\Migration;

/**
 * Handles the creation of table `polls_answers`.
 */
class m180410_175915_create_polls_answers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('polls_answers', [
            'id' => $this->primaryKey(),
            'text' => $this->string()->notNull(),
            'question_id' => $this->integer(10),
        ]);
        // creates index for column `polls_id`
        $this->createIndex(
            'idx-polls_answers-question_id',
            'polls_answers',
            'question_id'
        );

        // add foreign key for table `polls`
        $this->addForeignKey(
            'fk-polls_answers-question_id',
            'polls_answers',
            'question_id',
            'polls_questions',
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
            'fk-polls_questions-question_id',
            'polls_answers'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-polls_questions-question_id',
            'polls_answers'
        );

        $this->dropTable('polls_answers');
    }
}
