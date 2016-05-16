<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "recipient_list".
 *
 * @property integer $recipient_list_id
 * @property integer $group_id
 * @property string $recipient_name
 * @property string $recipient_phone_number
 *
 * @property UserGroup $group
 */
class RecipientList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recipient_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'recipient_name', 'recipient_phone_number'], 'required'],
            [['group_id'], 'integer'],
            [['recipient_name'], 'string', 'max' => 100],
            [['recipient_phone_number'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recipient_list_id' => 'Recipient List ID',
            'group_id' => 'Group ID',
            'recipient_name' => 'Recipient Name',
            'recipient_phone_number' => 'Recipient Phone Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(UserGroup::className(), ['group_id' => 'group_id']);
    }
}
