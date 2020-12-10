<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "countryLanguage".
 *
 * @property string $CountryCode
 * @property string $Language
 * @property string $IsOfficial
 * @property float $Percentage
 */
class CountryLanguage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countryLanguage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CountryCode', 'Language'], 'required'],
            [['IsOfficial'], 'string'],
            [['Percentage'], 'number'],
            [['CountryCode'], 'string', 'max' => 3],
            [['Language'], 'string', 'max' => 30],
            [['CountryCode', 'Language'], 'unique', 'targetAttribute' => ['CountryCode', 'Language']],
            [['CountryCode'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['CountryCode' => 'Code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CountryCode' => 'Country Code',
            'Language' => 'Language',
            'IsOfficial' => 'Is Official',
            'Percentage' => 'Percentage',
        ];
    }
}
