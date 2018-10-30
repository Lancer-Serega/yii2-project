<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "lang".
 *
 * @property int $id
 * @property string $url Alphabetic identifier of the language to display in the URL (ru, en, de, ...)
 * @property string $local User language (locale)
 * @property string $name Name (English, Русский, ...)
 * @property int $default Lag indicating the default language (1 - default language)
 * @property string $date_update Update date (in unix timestamp)
 * @property string $date_create Creation date (in unix timestamp)
 */
class Lang extends ActiveRecord
{
    /**
     * Property to store the current language object
     * @var Lang
     */
    public static $current;

    /**
     * Getting the current language object
     * @return Lang
     */
    public static function getCurrent()
    {
        if( self::$current === null ){
            self::$current = self::getDefaultLang();
        }
        return self::$current;
    }

    /**
     * Setting the current language object and user locale
     * @param string $url
     */
    public static function setCurrent($url = null)
    {
        $language = self::getLangByUrl($url);
        self::$current = ($language === null) ? self::getDefaultLang() : $language;
        Yii::$app->language = self::$current->local;
    }

    /**
     * Getting the default language object
     * @return Lang|ActiveRecord|array|null
     */
    public static function getDefaultLang()
    {
        return self::findOne(['default' => 1]);
    }

    /**
     * Receipt of language object by letter identifier
     * @param string $url
     * @return Lang|array|null|ActiveRecord
     */
    public static function getLangByUrl($url = null)
    {
        if ($url === null) {
            return null;
        }

        $language = self::findOne(['url' => $url]);
        if ( $language === null ) {
            return null;
        }

        return $language;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
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
    public function attributeLabels()
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
    public function behaviors()
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
}
