<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property int $floor
 * @property int $room_number
 * @property int $has_conditioner
 * @property int $has_tv
 * @property int $has_phone
 * @property string $available_from
 * @property string $price_per_day
 * @property string $description
 *
 * @property Reservation[] $reservations
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor', 'room_number', 'has_conditioner', 'has_tv', 'has_phone', 'available_from'], 'required'],
            [['floor', 'room_number', 'has_conditioner', 'has_tv', 'has_phone'], 'integer'],
            [['available_from'], 'safe'],
            [['price_per_day'], 'number'],
            [['description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'floor' => 'Floor',
            'room_number' => 'Room Number',
            'has_conditioner' => 'Has Conditioner',
            'has_tv' => 'Has Tv',
            'has_phone' => 'Has Phone',
            'available_from' => 'Available From',
            'price_per_day' => 'Price Per Day',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['room_id' => 'id']);
    }
    
    public function getLastReservation()
    {
        $ret = 
        $this->hasOne(
            Reservation::className(),
            ['room_id' => 'id']
            )
            ->orderBy('id');
        
            return $ret;
    }
    
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['id' =>
            'customer_id'])->via('reservations');
    }
    
}
