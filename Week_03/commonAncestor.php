<?php

class commonAncestor
{
    public $result; // 全局的 变量

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

        # recursion terminator
        if ($root->val == $p->val or $root->val == $q->val) return $root;
        if ($root == null) return null;

        # drill down
        $left  = $this->lowestCommonAncestor($root->left, $p, $q);
        $right = $this->lowestCommonAncestor($root->right, $p, $q);

        # process logic in current level
        if ($left == null and $right) return $right;
        if ($right == null and $left) return $left;
        if ($right && $left) return $root;
        return ; // return null;

        # reverse the current level status if needed

    }


    /**
     * leeCode dfs 解法
     * @param $node
     * @param $p
     * @param $q
     * @return bool
     * @author: Bear<brownbear9358@foxmail.com>
     * @Date：2020-07-24 10:04
     */
    public function dfs($node, $p, $q)
    {

        if ($node == null) return false;

        $find = [$p->val, $q->val];

        $Left_sub = (integer)$this->dfs($node->left, $p, $q);
        $right_sub = (integer)$this->dfs($node->right, $p, $q);

        if ( ($Left_sub && $right_sub) ||
            (in_array($node->val, $find) && ($right_sub || $Left_sub) ) ) {
            $this->result = $node;
        }

        return ($Left_sub || $right_sub || in_array($node->val, $find));

    }
}