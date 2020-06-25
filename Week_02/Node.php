<?php


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
