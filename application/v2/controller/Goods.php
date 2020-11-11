<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 14:14
 */
namespace app\v2\controller;

use app\common\controller\AdminBase;

class Goods extends AdminBase
{

    /**
     * 列表页
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 编辑 添加
     */
    public function create()
    {

        return $this->fetch();
    }

    /**
     * 排序
     */
    public function sort()
    {

    }

    /**
     * 删除
     */
    public function delete()
    {

        return $this->fetch();
    }
}