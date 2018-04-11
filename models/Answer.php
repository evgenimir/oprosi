<?php
/**
 * Created by PhpStorm.
 * User: Zheka1
 * Date: 11.04.2018
 * Time: 7:53
 */

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\behaviors\TimestampBehavior;
USE yii\db\Expression;


class Answer extends ActiveRecord
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

    public static function saveOrderItems($items, $question_id)
    {
        foreach ($items as $id => $item) {
            $order_items = new Answer(); /// ------------ то что надо
            $order_items ->question_id = $question_id;
            $order_items ->text = $item['text'];
            $order_items->save();
        }
    }

}