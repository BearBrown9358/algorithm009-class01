<?php


class node
{
    const  TYPE_TAG = 0;  //标签节点
    const  TYPE_TEXT = 1; //文本节点

    private $type;
    private $content;
    private $tag;

    private $children = array();
    private $currentChild = 0;

    /**
     * 构造函数
     * @param [type] $type    节点类型
     * @param string $tag     标签类型时指定是什么标签
     * @param string $content 指定文本
     */
    function __construct($type, $tag="", $content=""){
        $this->type = $type;
        $this->tag = $tag;
        $this->content = $content;
    }

    function getNextChild(){
        if($this->currentChild >= count($this->children)){
            return false;
        }
        return $this->children[$this->currentChild++];
    }

    function pushChild($node){
        array_push($this->children, $node);
        return $this;
    }

    //打印节点
    function content(){
        if($this->type == self::TYPE_TAG){
            return sprintf("<%s>", $this->tag);
        }
        return $this->content;
    }
}