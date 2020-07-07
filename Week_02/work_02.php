<?php


class Solution
{
    /**
     * 01 两数之和
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
     * 242  有效的字母异位词
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t)
    {
        return count_chars($s, 1) == count_chars($t, 1);
    }

    /**
     * 589 前序遍历 递归调用
     * @param Node $root
     * @return integer[]
     */
    function preorder($root)
    {
        $res = [];
        $this->helper($root, $res);
        return $res;
    }

    private function helper($root, &$res)
    {
        if (is_null($root)) return;
        $res[] = $root->val;
        foreach ($root->children as $children) {
            $this->helper($children, $res);
        }
    }

    /**
     * 94 二叉树 中序遍历
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root)
    {
        $res = [];
        $this->midHelper($root, $res);

        return $res;
    }

    private function midHelper($root, &$res)
    {
        if (is_null($root)) return;

        $this->midHelper($root->left, $res);
        $res[] = $root->val;
        $this->midHelper($root->right, $res);
    }

    /**
     * 144 二叉树 前序遍历
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root)
    {
        $res = [];
        $this->preHelper($root, $res);
        return $res;
    }

    private function preHelper($root, &$res)
    {
        if (is_null($root)) return;

        $res[] = $root->val;
        $this->preHelper($root->left, $res);
        $this->preHelper($root->right, $res);
    }

    /**
     * 429 N叉树 层序遍历 ？？
     * @param Node $root
     * @return integer[][]
     */
    function levelOrder($root)
    {
        if ($root === null) {
            return [];
        }
        $res   = [];
        $queue = new \SplQueue();
        $queue->enqueue($root);
        while (!$queue->isEmpty()) {
            $len = $queue->count();
            $tmp = [];
            //输出当前层
            for ($i = 0; $i < $len; $i++) {
                $node  = $queue->dequeue();
                $tmp[] = $node->val;
                //将子节点入队
                foreach ($node->children as $child) {
                    $queue->enqueue($child);
                }
            }
            $res[] = $tmp;
        }
        return $res;
    }

    /**
     * 49 字母异位词分组
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs)
    {
        $res = [];
        foreach ($strs as $value) {
            $arr = str_split($value);
            sort($arr);
            $res[implode('', $arr)][] = $value;
        }

        return $res;
    }


    /**
     * 二叉树遍历
     * @param $root
     * @param null $order 类型 default in  pre || post || in
     * @return array
     * @author: Bear<brownbear9358@foxmail.com>
     * @Date：2020-07-07 21:39
     */
    function binaryTraversal($root, $order = null)
    {

        $res = [];
        if ($order != 'pre' && $order != 'in' && $order != 'post') {
            $order = 'in';
        }
        $this->preHelper($root, $res, $order);
        return $res;
    }

    /**
     * binary subset
     * @param $root
     * @param $res
     * @param $order
     * @author: Bear<brownbear9358@foxmail.com>
     * @Date：2020-07-07 21:38
     */
    private function binaryHelper($root, &$res, $order)
    {
        if (is_null($root)) return;

        switch ($order) {
            case 'pre':
                $res[] = $root->val;
                $this->binaryHelper($root->left, $res);
                $this->binaryHelper($root->right, $res);
                break;
            case  'in' :
                $this->binaryHelper($root->left, $res);
                $res[] = $root->val;
                $this->binaryHelper($root->right, $res);
                break;
            case 'post':
                $this->binaryHelper($root->left, $res);
                $this->binaryHelper($root->right, $res);
                $res[] = $root->val;
                break;
            default:
                // default in
                $this->binaryHelper($root->left, $res);
                $res[] = $root->val;
                $this->binaryHelper($root->right, $res);
        }

    }
}