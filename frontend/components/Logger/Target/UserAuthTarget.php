<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 16.11.18
 * Time: 17:58
 */

namespace frontend\components\Logger\Target;


use yii\base\InvalidConfigException;
use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\log\Logger;
use yii\log\Target;
use yii\log\LogRuntimeException;
use yii\db\Connection;
use yii\di\Instance;

class UserAuthTarget extends Target
{
    /**
     * @var Connection|array|string the DB connection object or the application component ID of the DB connection.
     * After the DbTarget object is created, if you want to change this property, you should only assign it
     * with a DB connection object.
     * Starting from version 2.0.2, this can also be a configuration array for creating the object.
     */
    public $db = 'db';

    /**
     * @var string name of the DB table to store cache content. Defaults to "log".
     */
    public $logTable = '{{%log_user_auth}}';

    /**
     * @throws InvalidConfigException
     */
    public function init(): void
    {
        parent::init();
        $this->db = Instance::ensure($this->db, Connection::class);
    }

    /**
     * Exports log [[messages]] to a specific destination.
     * Child classes must implement this method.
     *
     * @throws LogRuntimeException
     * @throws \Throwable
     * @throws Exception
     */
    public function export(): void
    {
        if ($this->db->getTransaction()) {
            // create new database connection, if there is an open transaction
            // to ensure insert statement is not affected by a rollback
            $this->db = clone $this->db;
        }

        $tableName = $this->db->quoteTableName($this->logTable);
        $sql = "INSERT INTO $tableName (`user_id`, `ip`, `user_agent`, `msg`)
                VALUES (:user_id, :ip, :user_agent, :msg)";
        $command = $this->db->createCommand($sql);
        foreach ($this->messages as $message) {
            $text = $message[0];

            if (!\is_string($text)) {
                // exceptions may not be serializable if in the call stack somewhere is a Closure
                $text = $text instanceof \Throwable || $text instanceof \Exception
                    ? (string)$text
                    : VarDumper::export($text);
            }

            $values = [
                ':user_id' => \Yii::$app->user->getIdentity()->getId(),
                ':ip' => $_SERVER['REMOTE_ADDR'],
                ':user_agent' => $_SERVER['HTTP_USER_AGENT'],
                ':msg' => $text,
            ];
            $result = $command->bindValues($values)->execute();
            if ($result > 0) {
                continue;
            }

            throw new LogRuntimeException('Unable to export log through database!');
        }
    }

    /**
     * Format logger message
     * @param array $message
     * @return string
     */
    public function formatMessage($message): string
    {
        list($text, $level, $category, $timestamp) = $message;

        if (!\is_string($text)) {
            // exceptions may not be serializable if in the call stack somewhere is a Closure
            if ($text instanceof \Exception) {
                $text = (string) $text;
            } else {
                $text = VarDumper::export($text);
            }
        }
        $traces = [];
        if (isset($message[4])) {
            foreach ($message[4] as $trace) {
                $traces[] = ' ' . basename($trace['file']) . ":{$trace['line']}";
            }
        }

        return '[' . date('d-m H:i:s', $timestamp) . "]      $text"
            . (empty($traces) ? '' : "\n                      [" . trim(implode(' ', $traces))) . ']';
    }
}