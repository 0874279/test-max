<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $Code
 * @property string $Name
 * @property string $Continent
 * @property string $Region
 * @property float $SurfaceArea
 * @property int|null $IndepYear
 * @property int $Population
 * @property float|null $LifeExpectancy
 * @property float|null $GNP
 * @property float|null $GNPOld
 * @property string $LocalName
 * @property string $GovernmentForm
 * @property string|null $HeadOfState
 * @property int|null $Capital
 * @property string $Code2
 * @property int|null $werelddeel
 *
 * @property City[] $cities
 * @property City $capital
 * @property Werelddeel $werelddeel0
 * @property Countrylanguage[] $countrylanguages
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Code'], 'required'],
            [['Continent'], 'string'],
            [['SurfaceArea', 'LifeExpectancy', 'GNP', 'GNPOld'], 'number'],
            [['IndepYear', 'Population', 'Capital', 'werelddeel'], 'integer'],
            [['Code'], 'string', 'max' => 3],
            [['Name'], 'string', 'max' => 52],
            [['Region'], 'string', 'max' => 26],
            [['LocalName', 'GovernmentForm'], 'string', 'max' => 45],
            [['HeadOfState'], 'string', 'max' => 60],
            [['Code2'], 'string', 'max' => 2],
            [['Code'], 'unique'],
            [['Capital'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['Capital' => 'ID']],
            [['werelddeel'], 'exist', 'skipOnError' => true, 'targetClass' => Werelddeel::className(), 'targetAttribute' => ['werelddeel' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Code' => 'Code',
            'Name' => 'Name',
            'Continent' => 'Continent',
            'Region' => 'Region',
            'SurfaceArea' => 'Surface Area',
            'IndepYear' => 'Indep Year',
            'Population' => 'Population',
            'LifeExpectancy' => 'Life Expectancy',
            'GNP' => 'Gnp',
            'GNPOld' => 'Gnp Old',
            'LocalName' => 'Local Name',
            'GovernmentForm' => 'Government Form',
            'HeadOfState' => 'Head Of State',
            'Capital' => 'Capital',
            'Code2' => 'Code2',
            'werelddeel' => 'Werelddeel',
        ];
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['CountryCode' => 'Code']);
    }

    /**
     * Gets query for [[Capital]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCapital()
    {
        return $this->hasOne(City::className(), ['ID' => 'Capital']);
    }

    /**
     * Gets query for [[Werelddeel0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWerelddeel()
    {
        return $this->hasOne(Werelddeel::className(), ['id' => 'werelddeel']);
    }

    /**
     * Gets query for [[Countrylanguages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountryLanguages()
    {
        return $this->hasMany(Countrylanguage::className(), ['CountryCode' => 'Code']);
    }
}
