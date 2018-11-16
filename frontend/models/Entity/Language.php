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
 * @property string $local User language (locale)
 * @property string $name Name (English, Русский, ...)
 * @property int $default Lag indicating the default language (1 - default language)
 * @property string $date_update Update date (in unix timestamp)
 * @property string $date_create Creation date (in unix timestamp)
 */
class Language extends BaseEntity
{
    /**
     * Property to store the current language object
     * @var Language
     */
    public static $current;

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%language}}';
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'url' => 'Alphabetic identifier of the language to display in the URL (ru, en, de, ...)',
            'local' => 'User language (locale)',
            'name' => 'Name (English, Русский, ...)',
            'default' => 'Lag indicating the default language (1 - default language)',
            'date_update' => 'Update date (in unix timestamp)',
            'date_create' => 'Creation date (in unix timestamp)',
        ];
    }

    /**
     * {@inheritdoc}
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
     * Getting the current language object
     * @return Language
     * @throws \Throwable
     */
    public static function getCurrent(): Language
    {
        /**
         * @var User $user
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
     * Setting the current language object and user locale
     * @param string $url
     */
    public static function setCurrent($url = null): void
    {
        $language = self::getLangByUrl($url);
        self::$current = $language ?? self::getDefaultLang();
        Yii::$app->language = self::$current->local;
    }

    /**
     * Setting the current language object and user locale
     * @param int $id
     */
    public static function setCurrentById($id = null): void
    {
        $language = self::getById($id);
        self::$current = $language ?? self::getDefaultLang();
        Yii::$app->language = self::$current->local;
    }

    /**
     * Getting the default language object
     * @return Language|ActiveRecord|array|null
     */
    public static function getDefaultLang()
    {
        return self::findOne(['default' => 1]);
    }

    /**
     * @param int $languageId
     * @return Language
     */
    public static function getById(int $languageId): Language
    {
        return self::findOne(['id' => $languageId]);
    }

    /**
     * Receipt of language object by letter identifier
     * @param string $url
     * @return Language|array|null|ActiveRecord
     */
    public static function getLangByUrl($url = null)
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
     * @param $key
     * @param $value
     * @return array
     */
    public static function prepareForDropdown(array $langList, $key, $value): array
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
