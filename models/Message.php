<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $is_read
 * @property string $time_created
 * @property string $time_last
 * @property string $title
 * @property string $remark
 * @property integer $type
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'is_read', 'type'], 'integer'],
            [['time_created', 'time_last'], 'safe'],
            [['remark'], 'string'],
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
            'user_id' => 'User ID',
            'is_read' => 'Is Read',
            'time_created' => 'Time Created',
            'time_last' => 'Time Last',
            'title' => 'Title',
            'remark' => 'Remark',
            'type' => 'Type',
        ];
    }

    /**
     * @inheritdoc
     * @return MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    }
}
