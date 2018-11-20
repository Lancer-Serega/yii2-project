<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 29.10.18
 * Time: 18:24
 */

namespace console\controllers;

use frontend\services\RbacService;
use Yii;
use yii\console\Controller;
use yii\rbac\DBManager;

class RbacController extends Controller
{
    /**
     * @throws \yii\base\Exception
     * @throws \Exception
     */
    public function actionInit()
    {
        /**
         * @var DBManager $auth
         */
        $auth = Yii::$app->authManager;
        $permitCabinetView = $auth->createPermission(RbacService::PERMISSION_CABINET_VIEW);
        $permitCabinetView->description = 'Access to the personal cabinet for registered users';
        $auth->add($permitCabinetView);

        $roleUser = $auth->createRole(RbacService::ROLE_USER);
        $roleUser->description = 'Role - UserEntity';
        $auth->add($roleUser);
        $auth->addChild($roleUser, $permitCabinetView);

        $roleAdmin = $auth->createRole(RbacService::ROLE_ADMIN);
        $roleAdmin->description = 'Role - Admin';
        $auth->add($roleAdmin);
        $auth->addChild($roleAdmin, $roleUser);

        $roleRoot = $auth->createRole(RbacService::ROLE_ROOT);
        $roleRoot->description = 'Role - Root';
        $auth->add($roleRoot);
        $auth->addChild($roleRoot, $roleAdmin);

        $auth->assign($roleRoot, 1);
        $auth->assign($roleAdmin, 2);
        $auth->assign($roleUser, 3);
        $auth->assign($roleUser, 4);
        $auth->assign($roleUser, 5);
    }
}