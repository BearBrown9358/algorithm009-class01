<?php


class Solution
{
    /**
     * 01 两数之和
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        for ($i = 0; $i < count($nums) ; $i ++ ){
            $key = array_search($target - $nums[$i] , $nums);
            if (is_null($key) || $key === false) continue;

            if ($key != $i) return [$i , $key];
        }
        return [];
    }

    /**
     * 242  有效的字母异位词
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        return count_chars($s, 1) == count_chars($t, 1);
    }
}