<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class tree
{
    /**
     * 优化 解 leetcode105
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        $this->pre_order = $preorder;
        $this->in_order = $inorder;
        $this->pre_index = 0;

        return $this->helper(0 , count($inorder) - 1);
    }

    private $pre_index; // 前序 索引 0开始
    private $pre_order;
    private $in_order;

    /**
     * 辅助函数
     * @param $in_start
     * @param $in_end
     * @return object
     */
    private function helper($in_start , $in_end){
        if ($in_start > $in_end) return ;

        $node_val = $this->pre_order[$this->pre_index];
        $node = new TreeNode($node_val);

        $in_order_index = array_search($node_val , $this->in_order);

        $this->pre_index ++ ;

        $node->left = $this->helper($in_start , $in_order_index - 1);
        $node->right = $this->helper($in_order_index + 1  , $in_end);

        return $node;
    }
}