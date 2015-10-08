<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "m_user".
 *
 * @property integer $idroles_id
 * @property integer $roles_id
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property integer $is_deleted
 * @property string $created_at
 * @property integer $created_by
 * @property string $modified_at
 * @property integer $modified_by
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_deleted'], 'integer'],
            [['settings'], 'safe'],
            [['nama', 'username', 'password'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'username' => 'Username',
            'password' => 'Password',
            'is_deleted' => 'Is Deleted',
        ];
    }
    
}
