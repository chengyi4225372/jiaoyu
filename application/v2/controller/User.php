<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 10:47
 */
namespace app\v2\controller;

use app\common\controller\AdminBase;
use app\common\validate\Admin;

/**
 * Class User
 * @package app\v2\controller
 * 后台用户控制器
 */

class User extends AdminBase
{

    /**
     * 用户列表
     */
    public function index()
    {

        return $this->fetch();
    }

    /**
     * 添加编辑
     */
    public function create()
    {

        return $this->fetch();
    }

    /**
     * 用户个人详情
     */
     public function userInfo()
     {

         return $this->fetch();
     }


     /**
      * 忘记密码
      */
     public function edit_pwd()
     {
         return $this->fetch();
     }
}