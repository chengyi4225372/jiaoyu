<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


/**
 * 对象装数组
 */
function objectToArray($obj) {

    //首先判断是否是对象

    $arr = is_object($obj) ? get_object_vars($obj) : $obj;

    if(is_array($arr)) {

        //这里相当于递归了一下，如果子元素还是对象的话继续向下转换

        return array_map(__FUNCTION__, $arr);

    }else {

        return $arr;

    }

}


/**
 * 分析数组及枚举类型配置值 格式 a:名称1,b:名称2
 * @return array
 */
function parse_config_attr($string)
{

    $array = preg_split('/[,;\r\n]+/', trim($string, ",;\r\n"));

    if (strpos($string, ':')) {

        $value = [];

        foreach ($array as $val) {

            list($k, $v) = explode(':', $val);

            $value[$k] = $v;
        }

    } else {

        $value = $array;
    }

    return $value;
}

/**
 * 解析数组配置
 */
function parse_config_array($name = '')
{

    return parse_config_attr(config($name));
}

/**
 * 将二维数组数组按某个键提取出来组成新的索引数组
 */
function array_extract($array = [], $key = 'id')
{

    $count = count($array);

    $new_arr = [];

    for($i = 0; $i < $count; $i++) {

        if (!empty($array) && !empty($array[$i][$key])) {

            $new_arr[] = $array[$i][$key];
        }
    }

    return $new_arr;
}

/**
 * 根据某个字段获取关联数组
 */
function array_extract_map($array = [], $key = 'id'){


    $count = count($array);

    $new_arr = [];

    for($i = 0; $i < $count; $i++) {

        $new_arr[$array[$i][$key]] = $array[$i];
    }

    return $new_arr;
}

/**
 * 页面数组提交后格式转换
 */
function transform_array($array)
{

    $new_array = array();
    $key_array = array();

    foreach ($array as $key=>$val) {

        $key_array[] = $key;
    }

    $key_count = count($key_array);

    foreach ($array[$key_array[0]] as $i => $val) {

        $temp_array = array();

        for( $j=0;$j<$key_count;$j++ ){

            $key = $key_array[$j];
            $temp_array[$key] = $array[$key][$i];
        }

        $new_array[] = $temp_array;
    }

    return $new_array;
}

/**
 * 页面数组转换后的数组转json
 */
function transform_array_to_json($array)
{

    return json_encode(transform_array($array));
}

/**
 * 关联数组转索引数组
 */
function relevance_arr_to_index_arr($array)
{

    $new_array = [];

    foreach ($array as $v)
    {

        $temp_array = [];

        foreach ($v as $vv)
        {
            $temp_array[] = $vv;
        }

        $new_array[] = $temp_array;
    }

    return $new_array;
}

/**
 * 数组转换为字符串，主要用于把分隔符调整到第二个参数
 * @param  array  $arr  要连接的数组
 * @param  string $glue 分割符
 * @return string
 */
function arr2str($arr, $glue = ',')
{

    return implode($glue, $arr);
}

/**
 * 数组转字符串二维
 * @param  array  $arr  要连接的数组
 * @param  string $glue 分割符
 * @return string
 */
function arr22str($arr)
{

    $t ='' ;
    $temp = [];
    foreach ($arr as $v) {
        $v = join(",",$v);
        $temp[] = $v;
    }
    foreach ($temp as $v) {
        $t.=$v.",";
    }
    $t = substr($t, 0, -1);
    return $t;
}


// +---------------------------------------------------------------------+
// | 字符串相关函数
// +---------------------------------------------------------------------+

/**
 * 字符串转换为数组，主要用于把分隔符调整到第二个参数
 * @param  string $str  要分割的字符串
 * @param  string $glue 分割符
 * @return array
 */
function str2arr($str, $glue = ',')
{

    return explode($glue, $str);
}

/**
 * 字符串替换
 */
function sr($str = '', $target = '', $content = '')
{

    return str_replace($target, $content, $str);
}

/**
 * 字符串前缀验证
 */
function str_prefix($str, $prefix)
{

    return strpos($str, $prefix) === DATA_DISABLE ? true : false;
}

// +---------------------------------------------------------------------+
// | 文件相关函数
// +---------------------------------------------------------------------+

/**
 * 获取目录下所有文件
 */
function file_list($path = '')
{

    $file = scandir($path);

    foreach ($file as $k => $v) {

        if (is_dir($path . SYS_DS_PROS . $v)) {

            unset($file[$k]);
        }
    }

    return array_values($file);
}

/**
 * 获取目录列表
 */
function get_dir($dir_name)
{

    $dir_array = [];

    if (false != ($handle = opendir($dir_name))) {

        $i = 0;

        while (false !== ($file = readdir($handle))) {

            if ($file != "." && $file != ".."&&!strpos($file,".")) {

                $dir_array[$i] = $file;

                $i++;
            }
        }

        closedir($handle);
    }

    return $dir_array;
}

/**
 * 获取文件根目录
 */
function get_file_root_path()
{

    $root_arr = explode(SYS_DS_PROS, URL_ROOT);

    array_pop($root_arr);

    $root_url = arr2str($root_arr, SYS_DS_PROS);

    return $root_url . SYS_DS_PROS;
}

/**
 * 获取图片url
 */
function get_picture_url($id = 0)
{

    return (new LogicFile())->getPictureUrl($id);
}

/**
 * 获取头像图片url
 */
function get_head_picture_url($id = 0)
{

    return (new LogicFile())->getPictureUrl($id, true);
}

/**
 * 获取文件url
 */
function get_file_url($id = 0)
{

    return (new LogicFile())->getFileUrl($id);
}

/**
 * 删除所有空目录
 * @param String $path 目录路径
 */
function rm_empty_dir($path)
{

    if (!(is_dir($path) && ($handle = opendir($path))!==false)) {

        return false;
    }

    while(($file = readdir($handle))!==false)
    {

        if (!($file != '.' && $file != '..')) {

            continue;
        }

        $curfile = $path . SYS_DS_PROS . $file;// 当前目录

        if (!is_dir($curfile)) {

            continue;
        }

        rm_empty_dir($curfile);

        if (count(scandir($curfile)) == 2) {

            rmdir($curfile);
        }
    }

    closedir($handle);
}


// +---------------------------------------------------------------------+
// | 时间相关函数
// +---------------------------------------------------------------------+

/**
 * 时间戳格式化
 * @param int $time
 * @return string 完整的时间显示
 */
function format_time($time = null, $format='Y-m-d H:i:s')
{

    if (null === $time) {

        $time = TIME_NOW;
    }

    return date($format, intval($time));
}

/**
 * 获取指定日期段内每一天的日期
 * @param Date $startdate 开始日期
 * @param Date $enddate  结束日期
 * @return Array
 */
function get_date_from_range($startdate, $enddate)
{

    $stimestamp = strtotime($startdate);
    $etimestamp = strtotime($enddate);

    // 计算日期段内有多少天
    $days = ($etimestamp-$stimestamp)/86400+1;

    // 保存每天日期
    $date = [];

    for($i=0; $i<$days; $i++) {

        $date[] = date('Y-m-d', $stimestamp+(86400*$i));
    }

    return $date;
}

// +---------------------------------------------------------------------+
// | 调试函数
// +---------------------------------------------------------------------+

/**
 * 将数据保存为PHP文件，用于调试
 */
function sf($arr = [], $fpath = './test.php')
{

    $data = "<?php\nreturn ".var_export($arr, true).";\n?>";

    file_put_contents($fpath, $data);
}

/**
 * dump函数缩写
 */
function d($arr = [])
{
    dump($arr);
}

/**
 * dump与die组合函数缩写
 */
function dd($arr = [])
{
    dump($arr);die;
}


// +---------------------------------------------------------------------+
// | 其他函数
// +---------------------------------------------------------------------+

/**
 * 通过类创建逻辑闭包
 */
function create_closure($object = null, $method_name = '', $parameter = [])
{

    $func = function() use($object, $method_name, $parameter) {

        return call_user_func_array([$object, $method_name], $parameter);
    };

    return $func;
}




/**
 * 更新缓存版本
 */
function update_cache_version($obj = null)
{

    $ob_auto_cache = cache('ob_auto_cache');

    is_string($obj) ? $ob_auto_cache[$obj]['version']++ : $ob_auto_cache[$obj->getTable()]['version']++;

    cache('ob_auto_cache', $ob_auto_cache);
}

/**
 * 获取通知订单号
 */
function get_order_sn()
{

    $where['service_name']  = 'Pay';
    $where['status']        = DATA_NORMAL;

    $pay_types = Db::name('driver')->where($where)->select();

    $order_sn = null;

    foreach ($pay_types as $v)
    {

        $model = model($v['driver_name'], 'service\\pay\\driver');

        $order_sn = $model->getOrderSn();

        if (!empty($order_sn)) {  break; }
    }

    return $order_sn;
}

/**    富文本中转换 函数 **/

/**
 * @param $content
 * @return string
 * 得到富文本中纯文本内容
 */
function  geteditorcontent($content){
    return  strip_tags(html_entity_decode($content));
}


/**
 * 提取富文本中 图片 路径
 */
function imageUrl($content){
    $content =html_entity_decode($content);
    $url = "http://" . $_SERVER['SERVER_NAME'];
    $pregRule = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
    $list = preg_replace($pregRule, '<img src="' . $url . '${1}" style="max-width:100%">', $content);
    return $list;
}

/**
 * 提取富文本中 视频 路径
 */
function videoUrl($content) {
    $content =html_entity_decode($content);
    $url = "http://" . $_SERVER['SERVER_NAME'];
    $pregRule = "/<[video|source ].*?src=[\‘|\"](.*?(?:[\.mp4|\.avi]))[\‘|\"].*?[\/]?>/";
    $list = preg_replace($pregRule, '<img src=" '.$url.'${1}" style="max-width:100%">', $content);
    return $list;
}

/**
 * @param $url
 * @param null $data
 * @return mixed
 * curl 请求
 */
function http_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if(!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}


/**
 * @param $url
 * @return mixed
 * curl
 */

function  curl_get_https($url){
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
    $tmpInfo = curl_exec($curl);     //返回api的json对象
    //关闭URL请求
    curl_close($curl);
    return $tmpInfo;    //返回json对象
}