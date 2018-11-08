<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 06.11.18
 * Time: 18:19
 */

namespace frontend\services;


class RbacService
{
    public const ROLE_ROOT = 'root';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_USER = 'user';

    public const PERMISSION_CABINET_VIEW = 'cabinet.view';
}