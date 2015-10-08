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
class Article extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['article_category_id', 'created_user_id', 'hits', 'publish'], 'integer'],
            [['content', 'alias', 'keyword', 'description'], 'string'],
            [['created', 'modified'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['primary_image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'article_category_id' => 'Article Category ID',
            'title' => '		',
            'content' => 'Content',
            'primary_image' => 'Primary Image',
            'created' => 'Created',
            'created_user_id' => 'Created User ID',
            'modified' => 'Modified',
            'alias' => 'Alias',
            'hits' => 'Hits',
            'publish' => 'Publish',
            'keyword' => 'Keyword',
            'description' => 'Description',
        ];
    }

    public function getImgSmall() {
        if (empty($this->primary_image)) {
            return Yii::$app->params['urlImg'] . '/150x150-noimage.jpg';
        } else {
            return Yii::$app->params['urlImg'] . '/article/' . $this->id . '-150x150-' . Yii::$app->landa->urlParsing($this->primary_image);
        }
    }

    public function getImgMedium() {
        if (empty($this->primary_image)) {
            return Yii::$app->params['urlImg'] . '/350x350-noimage.jpg';
        } else {
            return Yii::$app->params['urlImg'] . '/article/' . $this->id . '-350x350-' . Yii::$app->landa->urlParsing($this->primary_image);
        }
    }

    public function getImgBig() {
        if (empty($this->primary_image)) {
            return Yii::$app->params['urlImg'] . '/700x700-noimage.jpg';
        } else {
            return Yii::$app->params['urlImg'] . '/article/' . $this->id . '-700x700-' . Yii::$app->landa->urlParsing($this->primary_image);
        }
    }

    public function getUrl() {
        return Yii::$app->urlManager->createUrl($this->alias);
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'created_user_id']);
    }
    
    public function getCategory() {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'article_category_id']);
    }

}
