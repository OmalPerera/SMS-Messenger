<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sent_list".
 *
 * @property integer $sent_list_id
 * @property string $recipient_phone_number
 *
 * @property MessageHistory $messageHistory
 */
class SentList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sent_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recipient_phone_number'], 'required'],
            [['recipient_phone_number'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sent_list_id' => 'Sent List ID',
            'recipient_phone_number' => 'Recipient Phone Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessageHistory()
    {
        return $this->hasOne(MessageHistory::className(), ['message_sent_list' => 'sent_list_id']);
    }
}
