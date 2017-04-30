<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class DayItem
 * @package app\models
 * @property string $date
 * @property string $type
 * @property int $meal_item
 */
class DayItem extends ActiveRecord
{
    const TYPE_BREAKFAST = 'breakfast';
    const TYPE_LUNCH = 'lunch';
    const TYPE_DINNER = 'dinner';

    public function getMealItem()
    {
        return $this->hasOne(MealItem::class, ['id' => 'meal_item']);
    }
}