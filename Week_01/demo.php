<?php

/**
 * Class Solution
 * {}[]() 字符串规则判断
 */
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        if ($s == '') return true;
        $map = array(
            '{' => '}',
            '(' => ')',
            '[' => ']',
        );
        $stack = [];
        $s_arr = str_split($s);
        foreach ( $s_arr as $value) {
            if ($value == '{' || $value == '(' ||$value == '['){
                $stack[] = $value;
            }elseif ($value == '}' || $value == ')' ||$value == ']'){
                if ($map[array_pop($stack)] == $value) continue;
                return false;
            }else{
                return false;
            }
        }

        if (empty($stack)) return true;
        return false;
    }

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid2($s) {
        if ($s == '') return true;

        $s = str_replace(' ', '', $s);
        $counter = 0;

        do {
            $counter += preg_match_all('/(\(\)|\{\}|\[\])/', $s);
            $s = str_replace(['[]', '()', '{}'], '', $s);

            if ($counter == 0)
                break;
        } while (strlen($s));

        return !$s;
    }
}