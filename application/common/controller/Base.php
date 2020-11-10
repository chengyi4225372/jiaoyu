<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/10
 * Time: 17:07
 */
namespace app\common\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    protected $param;


    public function initialize(Request $request)
    {
        parent::initialize();

        $this->initBase(); //初始化设置
    }

    /**
     * 初始话框架设置
     */
    public function initBase(){
        defined('IS_POST')          or define('IS_POST',         $this->request->isPost());
        defined('IS_GET')           or define('IS_GET',          $this->request->isGet());
        defined('IS_AJAX')          or define('IS_AJAX',         $this->request->isAjax());
        defined('IS_PJAX')          or define('IS_PJAX',         $this->request->isPjax());
        defined('IS_MOBILE')        or define('IS_MOBILE',       $this->request->isMobile());
        defined('MODULE_NAME')      or define('MODULE_NAME',     strtolower($this->request->module()));
        defined('CONTROLLER_NAME')  or define('CONTROLLER_NAME', strtolower($this->request->controller()));
        defined('ACTION_NAME')      or define('ACTION_NAME',     strtolower($this->request->action()));
        defined('URL')              or define('URL',             CONTROLLER_NAME . SYS_DS_PROS . ACTION_NAME);
        defined('URL_TRUE')         or define('URL_TRUE',        $this->request->url(true));
        defined('DOMAIN')           or define('DOMAIN',          $this->request->domain());
        defined('URL_ROOT')         or define('URL_ROOT',        $this->request->root());

        $this->param = $this->request->param();
    }


}