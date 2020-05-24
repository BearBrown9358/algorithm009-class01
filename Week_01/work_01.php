<?php

/**
 * Class Solution
 * {}[]() 字符串规则判断
 */
class Solution
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }

    /**
     * 26 删除有序数组重复项目
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums)
    {
        $count = count($nums);
        for ($i = 0; $i < $count - 1; $i++) {
            if ($nums[$i] == $nums[$i + 1]) unset($nums[$i]);
        }
        return count($nums);
    }


    /**
     * 189 旋转数组
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k)
    {
        $num_left  = array_slice($nums, 0, count($nums) - $k);
        $num_right = array_slice($nums, count($nums) - $k, $k);
        $nums      = array_merge($num_right, $num_left);
        return true;
    }

    /**
     * 21 合并两个有序列表
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2)
    {
        if (is_null($l1)) return $l2;
        if (is_null($l2)) return $l1;

        if ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }

    /**
     * 88 合并有序数组
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n)
    {
        $nums1 = array_merge(array_slice($nums1, 0, $m),
            array_slice($nums2, 0, $n));
        sort($nums1);
        return true;
    }

    /**
     * 1 两数和
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        for ($i = 0; $i < count($nums); $i++) {
            $key = array_search($target - $nums[$i], $nums);
            if (is_null($key) || $key === false) continue;

            if ($key != $i) return [$i, $key];
        }
        return [];
    }


    /**
     * 283 移动零
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums)
    {
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] == 0) {
                $nums[] = 0;
                unset($nums[$i]);
            }
        }
        return $nums;
    }

    /**
     * 66 加一
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits)
    {
        for ($i = count($digits) - 1; $i >= 0; $i--) {
            if ($digits[$i] == 9) {
                $digits[$i] = 0;

                if ($i == 0) array_unshift($digits , 1);
            }else {
                $digits[$i] += 1;
                break;
            }
        }
        return $digits;
    }



}