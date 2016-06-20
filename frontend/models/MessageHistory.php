<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "message_history".
 *
 * @property integer $history_log_id
 * @property string $message_id
 * @property string $message_sent_list
 * @property string $delivery_id
 *
 * @property Message $message
 * @property MessageDelivery $delivery
 * @property SentList $messageSentList
 */
class MessageHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_id', 'message_sent_list', 'delivery_id'], 'required'],
            [['message_id', 'message_sent_list', 'delivery_id'], 'string', 'max' => 25],
            [['message_sent_list'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'history_log_id' => 'History Log ID',
            'message_id' => 'Message ID',
            'message_sent_list' => 'Message Sent List',
            'delivery_id' => 'Delivery ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessage()
    {
        return $this->hasOne(Message::className(), ['message_id' => 'message_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDelivery()
    {
        return $this->hasOne(MessageDelivery::className(), ['delivery_id' => 'delivery_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessageSentList()
    {
        return $this->hasOne(SentList::className(), ['sent_list_id' => 'message_sent_list']);
    }
}
