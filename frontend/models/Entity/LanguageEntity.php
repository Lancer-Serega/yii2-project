<?php

namespace frontend\models\Entity;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string $url Alphabetic identifier of the language to display in the URL (ru, en, de, ...)
 * @property string $local UserEntity language (locale)
 * @property string $name Name (English, Русский, ...)
 * @property int $default Lag indicating the default language (1 - default language)
 * @property string $date_update Update date (in unix timestamp)
 * @property string $date_create Creation date (in unix timestamp)
 */
class LanguageEntity extends BaseEntity
{
    /**
     * Property to store the current language object
     * @var LanguageEntity
     */
    public static $current;

    /**
     * @var array
     */
    public static $languageList = ['en', 'ru'];

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%language}}';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['url', 'local', 'name'], 'required'],
            [['default'], 'integer'],
            [['date_update', 'date_create'], 'safe'],
            [['url', 'local', 'name'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['local'], 'unique'],
            [['name'], 'unique'],
        ];
    }

    /**
     * @return array
     */
    public function behaviors(): array
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
            ],
        ];
    }

    /**
     * Getting the current language object.
     *
     * @return LanguageEntity
     * @throws \Throwable
     */
    public static function getCurrent(): LanguageEntity
    {
        /**
         * @var UserEntity $user
         */
        if (self::$current === null) {
            if ($user = \Yii::$app->user->getIdentity()) {
                self::$current = self::getById($user->getUserConfig()->getLanguage()->id);
            }
        }

        if (self::$current === null) {
            self::$current = self::getDefaultLang();
        }

        return self::$current;
    }

    /**
     * Setting the current language object and user locale.
     *
     * @param string $url
     */
    public static function setCurrent(string $url = null): void
    {
        $language = self::getLangByUrl($url);
        self::$current = $language ?? self::getDefaultLang();
        Yii::$app->language = self::$current->local;
    }

    /**
     * Setting the current language object and user locale.
     *
     * @param int $id
     */
    public static function setCurrentById(int $id = null): void
    {
        $language = self::getById($id);
        self::$current = $language ?? self::getDefaultLang();
        Yii::$app->language = self::$current->local;
    }

    /**
     * Getting the default language object.
     *
     * @return LanguageEntity|null
     */
    public static function getDefaultLang(): ?LanguageEntity
    {
        return self::findOne(['default' => 1]);
    }

    /**
     * Getting the language object by ID.
     * @param int $languageId
     * @return LanguageEntity
     */
    public static function getById(int $languageId): ?LanguageEntity
    {
        return self::findOne(['id' => $languageId]);
    }

    /**
     * Receipt of language object by letter identifier.
     *
     * @param string $url
     * @return LanguageEntity|null
     */
    public static function getLangByUrl(string $url = null): ?LanguageEntity
    {
        if ($url === null) {
            return null;
        }

        $language = self::findOne(['url' => $url]);
        if ($language === null) {
            return null;
        }

        return $language;
    }

    /**
     * Prepare language list for html select/option tag
     * ```html
     *    <select>
     *        <option value="$key">$value</option>
     *    </select>
     * ```
     *
     * @param array $langList
     * @param string $key
     * @param string $value
     * @return array
     */
    public static function prepareForDropdown(array $langList, string $key, string $value): array
    {
        if (!\count($langList)) {
            return $langList;
        }

        $prepareLangList = [];
        foreach ($langList as $langInfo) {
            $prepareLangList[$langInfo[$key]] = $langInfo[$value];
        }

        return $prepareLangList;
    }
}
