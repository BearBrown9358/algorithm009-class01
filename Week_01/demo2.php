<?php

/**
 * Class Solution
 * 水滴容量计算
 */
class Solution
{

    private $demo = [0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1];

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height)
    {
        $hump = [];
        $s = 0;
        $len = count($height);

        for ($i = 0; $i < $len ;$i ++ ){
            // 判断 峰值
            if ($height[$i + 1] < $height[$i] && $height[$i-1] <$height[$i]){
                $hump[$i] = $height[$i];
            }
        }
        if (count($hump < 2)) return 0;


        return 0;
    }

}