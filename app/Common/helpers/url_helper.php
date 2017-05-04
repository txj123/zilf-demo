<?php
/**
 * 例子
 * toRoute('path/show');  # http://www.xx.com/currentBundle/path/show
 *
 * @param string $url
 * @param string $params
 * @param bool $scheme
 * @return string
 */
function toRoute($url = '', $params = '',$scheme = true){
    $bundle = \Zilf\System\Zilf::$app->bundle;

    if (strncmp($url, '//', 2) === 0) {
        // e.g. //hostname/path/to/resource
        return is_string($scheme) ? "$scheme:$url" : $url;
    }elseif (strncmp($url, '/', 1) === 0){
        // e.g. /path/to/resource
        $url = ltrim($url,'/');
        $bundle = '';
    }

    if($scheme){
        $host = \Zilf\Facades\Request::getInstance()->getSchemeAndHttpHost();
    }else{
        $host = '';
    }

    $url = $host.'/' . ($bundle ? strtolower($bundle) .'/' : '') . $url;
    if (is_string($scheme) && ($pos = strpos($url, '://')) !== false) {
        $url = $scheme . substr($url, $pos);
    }

    $str_param = '';
    if(is_array($params) && !empty($params)){
        $str_param = '/'.implode('/',$params);
    }elseif(!empty($params)){
        $str_param = '/'.(string)$params;
    }

    return $url.$str_param;
}

/**
 * 获取url的参数
 *
 * @param int $n
 * @return array|string
 */
function getSegment(int $n = 0)
{
    $n = (int)$n;
    $segments = \Zilf\System\Zilf::$app->params;
    if ($n >= 0) {
        return isset($segments[$n]) ? $segments[$n] : '';
    } else {
        return $segments;
    }
}