<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 14:42
 */
namespace app\v2\controller;

use app\common\controller\AdminBase;

/**
 * Class Icons
 * @package app\v2\controller
 * 框架图标库
 */

class Icons extends AdminBase
{

    public function index()
    {
        return $this->fetch();
    }

}