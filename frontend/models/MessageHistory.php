<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "message_history".
 *
 * @property integer $history_log_id
 * @property integer $message_id
 * @property integer $message_sent_group_id
 * @property integer $message_sent_list
 * @property integer $delivery_id
 *
 * @property SentList $messageSentList
 * @property Message $message
 * @property MessageDelivery $delivery
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
            [['history_log_id', 'message_id', 'message_sent_group_id', 'message_sent_list', 'delivery_id'], 'required'],
            [['history_log_id', 'message_id', 'message_sent_group_id', 'message_sent_list', 'delivery_id'], 'integer'],
            [['history_log_id'], 'unique'],
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
            'message_sent_group_id' => 'Message Sent Group ID',
            'message_sent_list' => 'Message Sent List',
            'delivery_id' => 'Delivery ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessageSentList()
    {
        return $this->hasOne(SentList::className(), ['sent_list_id' => 'message_sent_list']);
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
}
