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
class buildTree
{

    /**
     * 105 从前序与中序遍历序列构造二叉树 108ms
     * @param Integer[] $pre_order
     * @param Integer[] $in_order
     * @return TreeNode
     */
    function buildTree($pre_order, $in_order)
    {
        # recursion terminator
        if ($pre_order == null or  $in_order == null ) return ;

        # process logic in current level
        $root = new TreeNode($pre_order[0]);

        $in_order_key = array_search($pre_order[0], $in_order);
        $in_left  = array_slice($in_order, 0, $in_order_key);
        $in_right  = array_slice($in_order, $in_order_key + 1);
        $pre_left  = array_slice($pre_order, 1, $in_order_key);
        $pre_right = array_slice($pre_order, $in_order_key + 1);

        # drill down
        $root->left = $this->buildTree($pre_left, $in_left);
        $root->right = $this->buildTree($pre_right, $in_right);

        # reverse the current level status if needed
        return $root;
    }



    /**
     * leecode 优秀题解
     * 16ms
     */
    function tree($preorder, $inorder)
    {
        $this->preorder = $preorder;
        $this->inorder = $inorder;
        $this->inmap = array_flip($inorder);
        return $this->helper(0,count($inorder)-1);
    }

    private $inmap; //反转中序数组中所有键以及它们关联的值
    private $preindex = 0; // 前序参数索引
    private $preorder;
    private $inorder;

    function helper($instart,$inend){
        # recursion terminator
        if($instart > $inend) return null;

        # process logic in current level
        $nodeval = $this->preorder[$this->preindex];
        $inindex = $this->inmap[$nodeval];
        $node = new TreeNode($nodeval);
        $this->preindex++;

        $node->left = $this->helper($instart,$inindex-1);
        $node->right = $this->helper($inindex+1,$inend);
        return $node;
    }

}