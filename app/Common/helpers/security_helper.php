<?php

if (!function_exists('hashids_encode')) {
    /**
     * id 参数的数据加密
     *
     * @param array ...$args
     * @return mixed
     */
    function hashids_encode(...$args)
    {
        /**
         * @var $hashid \Zilf\Security\Hashids\Hashids
         */
        $hashid = \Zilf\System\Zilf::$container->get('hashids');
        return $hashid->encode($args);
    }
}

if (!function_exists('hashids_decode')) {
    /**
     * @param $hash
     * @return mixed
     */
    function hashids_decode($hash)
    {
        /**
         * @var $hashid \Zilf\Security\Hashids\Hashids
         */
        $hashid = \Zilf\System\Zilf::$container->get('hashids');
        $arr = $hashid->decode($hash);
        if(!empty($arr)){
            return count($arr) == 1 ? $arr[0] : $arr;
        }else{
            return null;
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////

if (!function_exists('password_make')) {
    /**
     * Hash the given value.
     *
     * @param  string  $value
     * @param  array   $options
     * @return string
     *
     * @throws \RuntimeException
     */
    function password_make($value, array $options = [])
    {
        /**
         * @var $hashing \Zilf\Security\Hashing\PasswordHashing
         */
        $hashing = \Zilf\System\Zilf::$container->get('hashing');
        return $hashing->make($value, $options);
    }
}

if (!function_exists('password_check')) {
    /**
     * Check the given plain value against a hash.
     *
     * @param  string  $value
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    function password_check($value, $hashedValue, array $options = [])
    {
        /**
         * @var $hashing \Zilf\Security\Hashing\PasswordHashing
         */
        $hashing = \Zilf\System\Zilf::$container->get('hashing');
        return $hashing->check($value, $hashedValue, $options);
    }
}