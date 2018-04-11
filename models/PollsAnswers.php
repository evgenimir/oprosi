<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "polls_answers".
 *
 * @property int $id
 * @property string $text
 * @property int $question_id
 *
 * @property PollsQuestions $question
 */
class PollsAnswers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polls_answers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['question_id'], 'default', 'value' => null],
            [['question_id'], 'integer'],
            [['text'], 'string', 'max' => 255],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => PollsQuestions::className(), 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'question_id' => 'Question ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(PollsQuestions::className(), ['id' => 'question_id']);
    }

}
