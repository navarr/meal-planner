<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Family
 * @package app\models
 * @property int $id
 * @property string $name
 */
class Family extends ActiveRecord
{
    /**
     * @return \yii\db\ActiveQuery|Account[]
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::class, ['family_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery|Meal[]
     */
    public function getMeals()
    {
        return $this->hasMany(Meal::class, ['family_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery|Menu[]
     */
    public function getMenu()
    {
        return $this->hasMany(Menu::class, ['family_id' => 'id']);
    }
}