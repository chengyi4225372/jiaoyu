<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 10:28
 */
namespace app\v2\controller;

use app\common\controller\AdminBase;

class Auth extends AdminBase
{

    public function index()
    {
        return $this->fetch();
    }
}