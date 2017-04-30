<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class Day extends ActiveRecord
{
    /**
     * @param $type
     * @return ActiveQuery
     */
    public function items($type)
    {
        return $this->hasMany(MealItem::class, ['id' => 'meal_item'])
            ->viaTable('day_item', ['date' => 'date'], function (ActiveQuery $query) use ($type) {
                $query->where('type = :type', [':type' => $type]);
            });
    }

    public function breakfastItems()
    {
        return $this->items(DayItem::TYPE_BREAKFAST);
    }

    public function lunchItems()
    {
        return $this->items(DayItem::TYPE_LUNCH);
    }

    public function dinnerItems()
    {
        return $this->items(DayItem::TYPE_DINNER);
    }
}