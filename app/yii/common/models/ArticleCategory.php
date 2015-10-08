<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "acca_article_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $created_user_id
 * @property integer $access
 * @property string $modified
 * @property string $created
 * @property integer $level
 * @property integer $lft
 * @property integer $rgt
 * @property integer $root
 * @property integer $parent_id
 * @property string $alias
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_user_id', 'access', 'level', 'lft', 'rgt', 'root', 'parent_id'], 'integer'],
            [['modified', 'created'], 'safe'],
            [['alias'], 'string'],
            [['name'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_user_id' => 'Created User ID',
            'access' => 'Access',
            'modified' => 'Modified',
            'created' => 'Created',
            'level' => 'Level',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'root' => 'Root',
            'parent_id' => 'Parent ID',
            'alias' => 'Alias',
        ];
    }
}
