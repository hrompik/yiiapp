<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $user_id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $fathername
 * @property string|null $avatar
 * @property string|null $inner_phone_number
 * @property string|null $mobile_phone
 *
 * @property User $user
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['firstname', 'lastname', 'fathername', 'mobile_phone'], 'string', 'max' => 25],
            [['avatar'], 'string', 'max' => 255],
            [['inner_phone_number'], 'string', 'max' => 20],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'fathername' => 'Fathername',
            'avatar' => 'Avatar',
            'inner_phone_number' => 'Inner Phone Number',
            'mobile_phone' => 'Mobile Phone',
            'user.username' => 'userName',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
}
