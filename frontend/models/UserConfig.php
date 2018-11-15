<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 14.11.18
 * Time: 19:47
 */

namespace frontend\models;


use yii\db\ActiveRecord;
use yii\db\ActiveRecordInterface;

/**
 * Class UserConfig
 * @property int $id
 * @property int $language_id [int(11) unsigned]  ID language on language table
 * @package frontend\models
 */
class UserConfig extends ActiveRecord
{
    /**
     * @var Language
     */
    public $language;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_config}}';
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @param int $configId
     * @return UserConfig
     */
    public static function getById(int $configId): UserConfig
    {
        return self::findOne(['id' => $configId]);
    }

    /**
     * @param null|int $languageId
     * @return Language
     */
    public function getLanguage($languageId = null): Language
    {
        if (!$languageId) {
            $languageId = $this->language_id;
        }
        $this->language = Language::getById($languageId);
        $this->language_id = $this->language->id;

        return $this->language;
    }

    /**
     * @param Language $language
     */
    public function setLanguage(Language $language): void
    {
        $this->language = $language;
    }
}