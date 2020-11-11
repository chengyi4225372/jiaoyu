<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 14:18
 */
namespace app\v2\controller;

use app\common\controller\AdminBase;

/**
 * Class Configs
 * @package app\v2\controller
 * 网站配置控制器
 */

class Configs extends AdminBase
{

    /**
     * @return mixed
     * 首页
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 系统页
     */
    public function system()
    {
        return $this->fetch();
    }

    /**
     * 上传页面
     */
    public function uploads()
    {
        return $this->fetch();
    }
}