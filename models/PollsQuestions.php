<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "polls_questions".
 *
 * @property int $id
 * @property string $title
 * @property int $polls_id
 *
 * @property Polls $polls
 */
class PollsQuestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polls_questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['polls_id'], 'default', 'value' => null],
            [['polls_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['polls_id'], 'exist', 'skipOnError' => true, 'targetClass' => Polls::className(), 'targetAttribute' => ['polls_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'polls_id' => 'Polls ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolls()
    {
        return $this->hasOne(Polls::className(), ['id' => 'polls_id']);
    }

    public static function getQuestions($id)
    {
        return PollsQuestions::find()->where(['polls_id' => $id])->all();
    }
}
