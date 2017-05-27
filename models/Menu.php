<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Menu
 * @package app\models
 * @property int $id
 * @property int $family_id
 * @property string $name
 */
class Menu extends ActiveRecord
{
    public function getFamily()
    {
        return $this->hasOne(Family::class, ['id' => 'family_id']);
    }
}