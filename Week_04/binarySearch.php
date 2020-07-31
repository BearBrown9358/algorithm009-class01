<?php


class binarySearch
{
    /**
     * binarySearch constructor.
     * @param array $array
     * @param int $target
     */
    public function binarySearch($array, $target)
    {
        $left  = 0;
        $right = count($array) - 1;

        while ($left <= $right) {
            $mid = $right + $left >> 1; // 位元算 去中点
            if ($array[$mid] == $target) {
                return $mid;
            } elseif ($array[$mid] > $target) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }

            return ;
        }
    }
}