<?php

namespace app\modules\titles\models;

use Yii;

/**
 * This is the model class for table "url_titles".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 */
class UrlTitles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'url_titles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'title'], 'required'],
            [['url', 'title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'title' => 'Title',
        ];
    }
}
