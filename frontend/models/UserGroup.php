<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_group".
 *
 * @property integer $group_id
 * @property integer $group_owner_id
 * @property string $group_name
 * @property string $group_registration_date
 *
 * @property RecipientList[] $recipientLists
 * @property User $groupOwner
 */
class UserGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_owner_id', 'group_name', 'group_registration_date'], 'required'],
            [['group_owner_id'], 'integer'],
            [['group_registration_date'], 'safe'],
            [['group_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'group_owner_id' => 'Group Owner ID',
            'group_name' => 'Group Name',
            'group_registration_date' => 'Group Registration Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipientLists()
    {
        return $this->hasMany(RecipientList::className(), ['group_id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'group_owner_id']);
    }
}
