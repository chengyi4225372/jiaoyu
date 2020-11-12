<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 15:09
 */
namespace app\v2\controller;

use app\common\controller\AdminBase;
use app\common\model\Pays as Payconfig;
use app\v2\validate\PayValidate;

/**
 * Class Pays
 * @package app\v2\controller
 * 支付控制器
 */

class Pays extends AdminBase
{

    protected $model = '';

    protected $validate ='';

    public function initialize()
    {
        parent::initialize();

        $this->model    = new Payconfig();
        $this->validate = new PayValidate();
    }

    /**
     * 支付参数页面
     */
    public function create()
    {
        if(IS_POST && $this->param)
        {
            $ret = $this->model->updateInfo($this->param);

            return $ret !== false ?$this->success($ret,'index'):$this->error($ret);
        };

        return $this->fetch();
    }



}