<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 14:36
 */
namespace app\v2\controller;

use app\common\controller\AdminBase;

/**
 * Class Orders
 * @package app\v2\controller
 * 订单控制器
 */

class Orders extends AdminBase
{
    /**
     * 列表
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 编辑
     */
    public function create()
    {
        return $this->fetch();
    }


}