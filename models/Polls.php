<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "polls".
 *
 * @property int $id
 * @property string $title
 *
 * @property PollsQuestions[] $pollsQuestions
 */
class Polls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollsQuestions()
    {
        return $this->hasMany(PollsQuestions::className(), ['polls_id' => 'id']);
    }

    public static function getName($id)
    {
        return Polls::find()->where(['id' => $id])->one();
    }

}
