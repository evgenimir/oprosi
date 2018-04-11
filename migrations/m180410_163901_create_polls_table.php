<?php

use yii\db\Migration;

/**
 * Handles the creation of table `polls`.
 */
class m180410_163901_create_polls_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('polls', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('polls');
    }
}
