<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 22.11.18
 * Time: 16:13
 */

namespace frontend\components;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Theme as BaseTheme;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;

class Theme extends BaseTheme
{

    public $active;

    /**
     * @param string $path
     * @return string
     * @throws InvalidConfigException
     */
    public function applyTo($path): string
    {
        $pathMap = ArrayHelper::getValue($this->pathMap,$this->active,$this->pathMap);
        if (empty($pathMap)) {
            if (($basePath = $this->getBasePath()) === null) {
                throw new InvalidConfigException('The "basePath" property must be set.');
            }
            $pathMap = [Yii::$app->getBasePath() => [$basePath]];
        }

        $path = FileHelper::normalizePath($path);
        foreach ($pathMap as $from => $tos) {
            $from = FileHelper::normalizePath(Yii::getAlias($from)) . DIRECTORY_SEPARATOR;
            if (strpos($path, $from) === 0) {
                $n = \strlen($from);
                foreach ((array) $tos as $to) {
                    $to = FileHelper::normalizePath(Yii::getAlias($to)) . DIRECTORY_SEPARATOR;
                    $file = $to . substr($path, $n);
                    if (is_file($file)) {
                        return $file;
                    }
                }
            }
        }

        return $path;
    }
}