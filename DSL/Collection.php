<?php


namespace DSL;

class Collection extends \ArrayObject
{
    function map($fn)
    {
        return new self(array_map($fn, (array)$this));
    }

    function __call($method, $args)
    {
        $method = preg_replace('/[A-Z]/', '_\0', $method);
        $func = 'array_' . $method;
        if (!function_exists($func)) {
            throw new \BadMethodCallException("func is not exists.");
        }

        $args = array_merge([(array)$this], $args);
        $res = call_user_func_array($func, $args);

        if (is_array($res)) {
            return new self($res);
        } else {
            return $res;
        }
    }
}
