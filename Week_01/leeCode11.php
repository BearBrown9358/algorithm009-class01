<?php

class leeCode11
{
    public function __construct()
    {
        print_r('hello word');
        $this->helloWord();
    }
    /**
     * 暴力求解
     * @param Integer[] $height
     * @return Integer
     */
//    function maxArea($height) {
//        $max = 0;
//        $count = count($height);
//        for ($i = 0 ; $i < $count ; $i ++ ){
//            for ($j = $i + 1 ; $j < $count ; $j ++ ){
//                $max = max($max , ($j - $i) * min($height[$j] , $height[$i]));
//            }
//        }
//        return $max;
//    }

    /**
     * 双指针
     * @param $height array
     * @return int
     * @author: Bear<brownbear9358@foxmail.com>
     * @Date：2020-07-09 17:00
     */
    public function maxArea($height)
    {
        $count = count($height);
        $i     = 0;
        $j     = $count - 1;
        $max   = 0;

        while ($i < $j) {
            $max = max($max, ($j - $i) * min($height[$i], $height[$j]));
            if ($height[$j] >= $height[$i]) {
                for ($a = $i; $a < $j; $a++) {
                    if ($height[$a] > $height[$i]) {
                        $i = $a;
                        break;
                    }
                }
                return $max;
            } else {
                for ($a = $j; $a > $i; $a--) {
                    if ($height[$a] > $height[$j]) {
                        $j = $a;
                        break;
                    }
                }
                return $max;
            }
        }
    }

    public function helloWord(){
        return 'hello word';
    }

}