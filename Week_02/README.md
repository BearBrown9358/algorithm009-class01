## 学习笔记 第二周 树 堆
### 树 结构学习

+ 树 PHP基础实现
+ ```php
    /** 树结构 基础类 */
    class Node
    {
        public $val = null;
        public $children = null;
    
        function __construct($val = 0)
        {
            $this->val      = $val;
            $this->children = array();
        }
    }
    ```

+ Sorted Binary Tree
  + 定义 ： left_subset < root < right_subset
  + O(lgN) 时间复杂度 极特殊`链表`时为 O(n)
  + 删除操作 ： 取值最邻近 节点补充原位置 `左侧最大时 OR 右侧最小值`
  
+ 遍历 Pre-order || In-order || post-order  --> (根的位置)
+ ```php
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
    ```