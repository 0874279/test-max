<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "werelddeel".
 *
 * @property int $id
 * @property string $naam
 */
class Werelddeel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'werelddeel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'naam'], 'required'],
            [['id'], 'integer'],
            [['naam'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'naam' => 'Naam',
        ];
    }
}
