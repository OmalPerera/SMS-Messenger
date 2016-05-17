<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "message_delivery".
 *
 * @property integer $delivery_id
 * @property integer $message_id
 * @property string $phone_number
 * @property string $delivery_message
 * @property string $delivery_date_time
 *
 * @property Message $message
 * @property MessageHistory[] $messageHistories
 */
class MessageDelivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message_delivery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_id', 'message_id', 'phone_number', 'delivery_message', 'delivery_date_time'], 'required'],
            [['delivery_id', 'message_id'], 'integer'],
            [['delivery_date_time'], 'safe'],
            [['phone_number', 'delivery_message'], 'string', 'max' => 20],
            [['delivery_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'delivery_id' => 'Delivery ID',
            'message_id' => 'Message ID',
            'phone_number' => 'Phone Number',
            'delivery_message' => 'Delivery Message',
            'delivery_date_time' => 'Delivery Date Time',
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
    public function getMessageHistories()
    {
        return $this->hasMany(MessageHistory::className(), ['delivery_id' => 'delivery_id']);
    }
}
