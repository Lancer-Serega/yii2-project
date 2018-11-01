<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 29.10.18
 * Time: 18:24
 */

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $roles = [];
        $roles['root'] = $auth->createRole('root');
        $roles['root']->description = 'Root';

        $roles['admin'] = $auth->createRole('admin');
        $roles['admin']->description = 'Admin';

        $roles['user'] = $auth->createRole('user');
        $roles['user']->description = 'User';

        $roles['guest'] = $auth->createRole('guest');
        $roles['guest']->description = 'Guest';

        $auth->add($roles['root'], $roles['admin']);
        $auth->add($roles['admin'], $roles['user']);
        $auth->add($roles['user'], $roles['guest']);

        // Назначение ролей пользователям.
        // 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($roles['root'], 1);
        $auth->assign($roles['admin'], 2);
        $auth->assign($roles['user'], 3);
        $auth->assign($roles['user'], 4);
        $auth->assign($roles['user'], 5);

        // Permissions
        $permit = Yii::$app->authManager->createPermission('user.auth');
        $permit->description = 'Authenticated user';
        $auth->add($permit);
    }
}