<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/12
 * Time: 10:53
 */
namespace app\v2\validate;

use app\common\validate\Base;

class PayValidate extends Base
{

    // 验证规则
    protected $rule =   [
        'url'  => 'require',
        'merchats_id' => 'require',
        'secret_key'  => 'require',
    ];

    // 验证提示
    protected $message  =   [
         'url.require'=>'支付链接不能为空',
         'merchats_id.require'=>'请输入商户id',
         'secret_key.require'=>'请输入商户秘钥',
    ];

    // 应用场景
    protected $scene = [
        'add'  =>  ['url','merchats_id','secret_key'],
        'edit' =>  ['url','merchats_id','secret_key'],
    ];

}