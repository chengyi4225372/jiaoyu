<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 10:09
 */
namespace app\v2\controller;

use app\common\controller\AdminBase;

class Index extends AdminBase
{

    /**
     * 后台首页
     */
    public function index()
    {

        return $this->fetch();
    }

}