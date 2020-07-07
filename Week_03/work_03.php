<?php

class Solution
{
    /**
     * 236 二叉树 最近公共先祖
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q)
    {
        /**
         * Definition for a binary tree node.
         * class TreeNode {
         *     public $val = null;
         *     public $left = null;
         *     public $right = null;
         *     function __construct($value) { $this->val = $value; }
         * }
         */

        if ($root == null) return;
        if ($root->val == $p->val || $root->val == $q->val) return $root;

        $left  = $this->lowestCommonAncestor($root->left, $p, $q);
        $right = $this->lowestCommonAncestor($root->right, $p, $q);

        if ($left !== null && $right !== null) return $root;
        if ($left == null) return $right;
        if ($right == null) return $left;
        return;

    }

    /**
     * 105 从前中序遍历序列构造二叉树
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder)
    {

    }

    /**
     * 四树求和
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target)
    {
        $count = count($nums);
        $return_array = [];

        for ($i = 0; $i < $count - 3; $i++) {
            for ($j = 1; $j < $count - 2; $j++) {
                for ($k = 2; $k < $count - 1; $k++) {
                    for ($x = 3; $x < $count    ; $x++) {
                        if ($nums[$i] + $nums[$j] +$nums[$k] + $nums[$x] == $target){
                            $sub_array = [$nums[$i], $nums[$j], $nums[$k], $nums[$x]];
                            $return_array[] = $sub_array;
                        }
                    }
                }
            }
        }
        return $return_array;
    }


    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums) {
        if ($nums[0] >= count($nums) - 1) return 1;

        $min = null;
        for ($i = 1; $i <= $nums[0] ; $i ++ ){
             $jump_return = $this->jump(array_slice($nums , $i)) + 1;
             if ($min == null || $min > $jump_return) $min = $jump_return;
        }

        return $min;
    }

    function fourSum1($nums, $target) {
        $len_n = count($nums);
        sort($nums, SORT_ASC);
        $res = [];

        for ($i = 0; $i < $len_n; $i++) {
            if ($i > 0 && $nums[$i] == $nums[$i-1])continue;
            for ($j = $i + 1; $j < $len_n; $j++) {
                $m = $j + 1;
                $n = $len_n - 1;
                if ($j-1 > $i && $nums[$j] == $nums[$j-1])continue;

                while ($m < $n) {
                    $tmp = $nums[$i] + $nums[$j] + $nums[$m] + $nums[$n];
                    if ($tmp == $target) {
                        $res[] = [$nums[$i], $nums[$j], $nums[$m], $nums[$n]];
                        while ($m < $n && $nums[$n] == $nums[$n-1]) {
                            $n--;
                        }
                        while ($m < $n && $nums[$m] == $nums[$m+1]) {
                            $m++;
                        }
                        $n--;
                        $m++;
                    } elseif ($tmp > $target) {
                        while ($m < $n && $nums[$n] == $nums[$n-1]) {
                            $n--;
                        }
                        $n--;
                    } else {
                        while ($m < $n && $nums[$m] == $nums[$m+1]) {
                            $m++;
                        }
                        $m++;
                    }
                }
            }
        }

        return $res;
    }
}
