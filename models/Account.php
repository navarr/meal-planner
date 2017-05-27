<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class Account
 * @package app\models
 * @property int $id
 * @property int $family_id
 * @property string $name
 * @property string $email
 * @property string $authkey
 * @property string $password
 */
class Account extends ActiveRecord implements IdentityInterface
{
    /**
     * @return \yii\db\ActiveQuery|Family
     */
    public function getFamily()
    {
        return $this->hasOne(Family::class, ['id' => 'family_id']);
    }

    /** {@inheritdoc} */
    public function getId()
    {
        return $this->id;
    }

    /** {@inheritdoc} */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /** {@inheritdoc} */
    public function getAuthKey()
    {
        return $this->authkey;
    }

    /** {@inheritdoc} */
    public function validateAuthKey($authKey)
    {
        return $this->authkey == $authKey;
    }

    /** {@inheritdoc} */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }
}