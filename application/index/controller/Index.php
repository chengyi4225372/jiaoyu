<?php
namespace app\index\controller;

use app\common\controller\HomeBase;

/**
 * Class Index
 * @package app\index\controller
 * 前台首页控制器
 */
class Index extends HomeBase
{

    /**
     * 首页
     */
     public function  index(){

         return $this->fetch();
     }



}