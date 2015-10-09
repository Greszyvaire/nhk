<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "acca_article".
 *
 * @property integer $id
 * @property integer $article_category_id
 * @property string $title
 * @property string $content
 * @property string $primary_image
 * @property string $created
 * @property integer $created_user_id
 * @property string $modified
 * @property string $alias
 * @property integer $hits
 * @property integer $publish
 * @property string $keyword
 * @property string $description
 */
class Testimoni extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'testi';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['status'], 'integer'],
            [['pesan', 'email', 'nama'], 'string'],
//            [['created', 'modified'], 'safe'],
//            [['title'], 'string', 'max' => 100],
//            [['primary_image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'pesan' => 'pesan',
            'email' => 'email',
        ];
    }

    

}
