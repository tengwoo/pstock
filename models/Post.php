<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property integer $state
 * @property integer $catalog
 * @property string $time_created
 * @property string $time_updated
 * @property string $content
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['state', 'catalog'], 'integer'],
            [['time_created', 'time_updated'], 'safe'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'state' => 'State',
            'catalog' => 'Catalog',
            'time_created' => 'Time Created',
            'time_updated' => 'Time Updated',
            'content' => 'Content',
        ];
    }
}
