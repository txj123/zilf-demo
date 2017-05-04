<?php

/**
 * 获取配置信息
 *
 * @param $name
 * @return $this
 */
function config_helper($name){
    return \Zilf\System\Zilf::$container->getShare('config')->get($name);
}


if (!function_exists('jumpPage')) {
    /*
     * 页面跳转
     *
     * @param $url String
     * @param $type String
     * @param $msg String
     * @Param $time int
     * @return NULL
     */
    function jumpPage($url, $type = 'meta', $msg = '正在跳转', $time = 0)
    {
        if (empty($url)) {
            return false;
        }

        switch (strtolower($type)) {
            case 'meta'://meta标签跳转
                echo '<meta http-equiv="refresh" content="' . $time . '; url=' . $url . '"> ' . $msg;
                break;

            case 'header'://header跳转
                sleep($time);
                header("location: {$url}");
                break;

            case '301'://301页面跳转
                sleep($time);
                header("HTTP/1.1 301 Moved Permanently");
                header("Location:{$url}");
                break;

            case 'js'://js方式跳转
                sleep($time);
                echo '<script language="javascript"> window.location= "' . $url . '";</script>';
                break;

            default://默认301方式跳转
                sleep($time);
                header("HTTP/1.1 301 Moved Permanently");
                header("Location:{$url}");
                break;
        }
        exit;
    }
}


if (!function_exists('getRealIp')) {
    /**
     * 获取用户真实的IP地址
     *
     * @return string
     */
    function getRealIp()
    {
        if (isset($_SERVER)) {
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $IPaddress = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $IPaddress = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")) {
                $IPaddress = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $IPaddress = getenv("HTTP_CLIENT_IP");
            } else {
                $IPaddress = getenv("REMOTE_ADDR");
            }
        }

        $pos = stripos($IPaddress, ',');
        if ($pos > 0) {
            $IPaddress = trim(substr($IPaddress, 0, $pos));
        }

        return $IPaddress;
    }
}


if (!function_exists('isMobile')) {
    /**
     * 验证手机号是否正确
     * 使用方法
     * 1、isMobile($mobile) 根据自带的验证方式判断手机号是否正确
     * 1、isMobile($mobile, $pattern)  $pattern为验证规则，如果$pattern不为空，则使用该规则验证
     *
     * @param int $mobile 手机号
     * @param string $pattern 正则匹配规则,默认是‘/1\d{10}/’
     * @return bool
     */
    function isMobile(int $mobile, string $pattern = '')
    {
        $pattern = $pattern ? $pattern : '0?1\d{10}';

        //去除左右的‘/’标签
        $pattern = ltrim($pattern, '/');
        $pattern = rtrim($pattern, '/');

        if (preg_match('/' . $pattern . '/', $mobile)) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('curPageURL')) {
    /**
     * 获取当前页面的完整的url信息
     *
     * @return string
     */
    function curPageURL()
    {
        $pageURL = 'http';

        if (isset($_SERVER["HTTPS"]) && $_SERVER['HTTPS'] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";

        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
}

/**
 * @param $url
 * @param string $data
 * @param string $type 返回类型 array json
 * @return mixed
 * curl get方式Http请求封装
 */
function curlGet($url, $data = '', $type = 'array')
{
    if (APP_DEBUG) {
        \DebugBar\ZilfDebugbar::get('time')->startMeasure('java', '接口执行时间：' . $url);
    }

    if (is_array($data)) {
        $url = $url . '?' . http_build_query($data);
    } elseif (is_string($data) && !empty($data)) {
        $url = $url . '?' . $data;
    }

    //初始化
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    //记录非正常接口日志信息
    if ($httpCode != 200) {
        \Think\Log::write('接口状态：' . $httpCode . ' URL地址：' . $url . ', 参数:' . json_encode($data));
    }

    if (APP_DEBUG) {
        $message = array('url' => $url, 'params' => $data, 'method' => 'get', 'code' => $httpCode, 'result' => $result);
        if ($httpCode == 200) {
            $st = 'info';
        } else {
            $st = 'error';
        }
        \DebugBar\ZilfDebugbar::debug($message, $st);

        \DebugBar\ZilfDebugbar::get('time')->stopMeasure('java');
    }

    if ($type == 'json') {
        return $result;
    } else {
        return json_decode($result, true);
    }
}

/**
 * @param $url
 * @param array $data
 * @param string $type 返回类型 array json
 * @return mixed
 * curl  post方式Http请求封装
 */
function curlPost($url, $data = array(), $type = 'array', $json = false)
{

    if (APP_DEBUG) {
        \DebugBar\ZilfDebugbar::get('time')->startMeasure('java', '接口执行时间：' . $url);
    }

    $ch = curl_init();
    if ($json) { //发送JSON数据
        $headers = array('Content-Type: application/json; charset=utf-8');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        if(is_array($data)){
            $data = json_encode($data);
        }
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    //记录非正常接口日志信息
    if ($httpCode != 200) {
        \Think\Log::write('接口状态：' . $httpCode . ' URL地址：' . $url . ', 参数:' . json_encode($data));
    }
    if (APP_DEBUG) {
        $message = array('url' => $url, 'params' => $data, 'method' => 'post', 'code' => $httpCode, 'result' => $result);
        if ($httpCode == 200) {
            $st = 'info';
        } else {
            $st = 'error';
        }
        \DebugBar\ZilfDebugbar::debug($message, $st);

        \DebugBar\ZilfDebugbar::get('time')->stopMeasure('java');
    }


    if ($type == 'json') {
        return $result;
    } else {
        return json_decode($result, true);
    }
}


if (! function_exists('str_limit')) {
    /**
     * Limit the number of characters in a string.
     *
     * @param  string  $value
     * @param  int     $limit
     * @param  string  $end
     * @return string
     */
    function str_limit($value, $limit = 100, $end = '...')
    {
        if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
        }

        return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')).$end;
    }
}


if (! function_exists('tap')) {
    /**
     * Call the given Closure with the given value then return the value.
     *
     * @param  mixed  $value
     * @param  callable  $callback
     * @return mixed
     */
    function tap($value, $callback)
    {
        $callback($value);

        return $value;
    }
}


if (! function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (! function_exists('windows_os')) {
    /**
     * Determine whether the current environment is Windows based.
     *
     * @return bool
     */
    function windows_os()
    {
        return strtolower(substr(PHP_OS, 0, 3)) === 'win';
    }
}


if (! function_exists('array_get')) {
    /**
     * Get an item from an array using "dot" notation.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function array_get($array, $key, $default = null)
    {
        return \Zilf\Support\Arr::get($array, $key, $default);
    }
}

if (! function_exists('array_has')) {
    /**
     * Check if an item or items exist in an array using "dot" notation.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string|array  $keys
     * @return bool
     */
    function array_has($array, $keys)
    {
        return \Zilf\Support\Arr::has($array, $keys);
    }
}