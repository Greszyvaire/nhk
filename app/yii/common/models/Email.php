<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "acca_email".
 *
 * @property integer $id
 * @property string $email_from
 * @property string $email_to
 * @property string $title
 * @property string $content
 * @property integer $is_send
 * @property string $client
 * @property string $created
 * @property string $created_user_name
 * @property string $modified
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acca_email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['is_send'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['email_from', 'email_to'], 'string', 'max' => 100],
            [['title', 'client', 'created_user_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email_from' => 'Email From',
            'email_to' => 'Email To',
            'title' => 'Title',
            'content' => 'Content',
            'is_send' => 'Is Send',
            'client' => 'Client',
            'created' => 'Created',
            'created_user_name' => 'Created User Name',
            'modified' => 'Modified',
        ];
    }
}
