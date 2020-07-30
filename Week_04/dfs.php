<?php

class dfs
{

    /**
     * 深度优先 递归
     */
    function dfs($node, $visited){
        # terminator
        if(in_array($node , $visited)) return ; # already visited

        # process current node here.
        # ...

        $visited[] = $node;

        foreach ($this->getChildren() as $child){
            if (in_array($child , $visited)) continue;

            $this->dfs($child , $visited);
        }
    }


    /**
     * 栈实现 DFS
     * @param $node
     * @author: Bear<brownbear9358@foxmail.com>
     * @Date：2020-07-25 15:03
     */
    function dfsStack(node $root){
        $stack = new stack();
        $stack->push($root);

        while($stack->notEmpty()){
            // $stack->debug();
            $top = $stack->top();
            $child = $top->getNextChild();
            if(!empty($child)){
                $stack->push($child);
            }else{
                $pop = $stack->pop();
                echo $pop->content()."\n";
            }
        }
    }
}