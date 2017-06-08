<?php

namespace app\models;

use yii\base\Model;

class Location extends Model
{
    private $countries;
    private $cities;

    public $country_id;
    public $city_id;

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->countries = Countries::find()->all();
    }

    public function rules()
    {
        return [
            [['country_id'], 'exist', 'skipOnError' => false, 'targetClass' => Countries::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'country_id' => 'Страна',
            'city_id' => 'Город',
        ];
    }

    public function getCountries()
    {
        return $this->countries;
    }

    public function getCities()
    {
        if ($this->country_id) {
            return Cities::find()->where(['country_id' => $this->country_id])->all();
        }
    }


    public function getCity()
    {
        return Cities::find()->where(['id' => $this->city_id, 'country_id' => $this->country_id])->one();
    }

    public function getCountry()
    {
        return Countries::findOne($this->country_id);
    }
}