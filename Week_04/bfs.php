<?php

/**
 * Class bfs
 * 广度优先
 * breadth first search
 */
class bfs
{
    private $queue = [];

    public function traverseTree($rootNode, $dummyQueue)
    {
        if ($rootNode->lft != 0) {
            $dummyQueue->enqueue($rootNode->lft);
        }
        if ($rootNode->rgt != 0) {
            $dummyQueue->enqueue($rootNode->rgt);
        }
        if (!($dummyQueue->isEmpty())) {
            $nextId   = $dummyQueue->dequeue();
            $nextNode = null; //get next node information using $nextId
            array_push($this->queue, $nextNode);
            $this->traverseTree($nextNode, $dummyQueue);
        }
    }


    /**
     * bfs constructor.
     * 广度优先遍历
     * @param $root tree
     */
    public function bfs($root)
    {
        $result      = [];
        $this->queue = [$root];

        while (count($root) > 0) {
            $level  = [];
            $length = count($root);

            for ($i = 0; $i < $length; $i++) {
                $node    = array_pop($this->queue);
                $level[] = $node->val;
                if ($node->left) array_unshift($this->queue, $node->left);
                if ($node->right) array_unshift($this->queue, $node->right);
            }

            $result[] = $level;
        }

        return $result;
    }

    /**
     * 剑指offer 32
     * 从上到下打印二叉树
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        if(empty($root)) return [];
        $queue = array($root);
        $res = array();
        $lev = 0;
        while($queue){
            $c = count($queue);
            for($i=0;$i<$c;$i++){
                $a = array_shift($queue);
                $res[$lev][]=$a->val;
                if($a->left) $queue[]=$a->left;
                if($a->right) $queue[]=$a->right;
            }
            $lev++;
        }
        return $res;
    }

    /**
     *  BFS模版
     * @param $root
     * @return  array res
     */
    public function myBfs($root){
        if (empty($root)) return [];
        $queue = array($root);
        $res = [];
        $level = 0;
        
        while ($queue){
            $c = count($queue);
            for ($i = 0 ; $i < $c ; $i ++ ){
                $node = array_shift($queue);
                $val = $node->val;
                $res[$level][] = $val;

                if ($node->left) $queue[] = $node->left;
                if ($node->right) $queue[] = $node->right;
            }

            $level ++ ;
        }
        return $res;
    }

}