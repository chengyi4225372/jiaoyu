<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/10
 * Time: 16:44
 */
namespace app\v2\controller;

use app\common\controller\AdminBase;

/**
 * Class Base
 * @package app\V2\controller
 * 后台基类控制器
 */
class Login extends AdminBase
{

   /**
    * 登录页
    */
    public function index()
    {

        $this->view->engine->layout(false); //登录模板禁用layout
        return $this->fetch();
    }



    /**
     * 退出
     */
    public function logout()
    {


    }
}