<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Meal
 * @package app\models
 * @property int $id
 * @property string $date
 * @property int $family_id
 * @property string $name
 */
class Meal extends ActiveRecord
{
    /**
     * @return \yii\db\ActiveQuery|Family
     */
    public function getFamily()
    {
        return $this->hasOne(Family::class, ['id' => 'family_id']);
    }

    /**
     * @return \yii\db\ActiveQuery|Menu[]
     */
    public function getItems()
    {
        return $this->hasMany(Menu::class, ['id' => 'menu_id'])
            ->viaTable('meal_item', ['meal_id' => 'id']);
    }
}