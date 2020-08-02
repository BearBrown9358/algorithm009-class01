<?php

/**
 * Class week_06
 * 动态规划 练习
 */
class week_06
{
    /**
     * 最长公共子序列 经典DP 1143
     * @param $text1
     * @param $text2
     * @return mixed
     * @author: Bear<brownbear9358@foxmail.com>
     * @Date：2020-07-31 15:30
     */
    function longestCommonSubsequence($text1, $text2) {
        $m = strlen($text1);
        $n = strlen($text2);
        $dp[0][0] = 0;

        for ($i=1; $i <= $m; $i++) {
            $dp[0][$i] = 0;
        }

        for ($i=1; $i <= $n; $i++) {
            $dp[$i][0] = 0;
        }

        for ($i=0; $i < $m; $i++) {
            for ($j=0; $j < $n; $j++) {
                if($text1[$i] == $text2[$j]) {
                    $dp[$i + 1][$j + 1] = $dp[$i][$j] + 1;
                }else{
                    $dp[$i + 1][$j + 1] = max($dp[$i + 1][$j], $dp[$i][$j + 1]);
                }
            }
        }

        return $dp[$m][$n];
    }


    /**
     * 198 打家劫舍问题 二维DP
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        $n = count($nums);
        if ($n == 0) return 0;
        if ($n == 1) return reset($nums);
        if ($n == 2) return max($nums);

        // dp 数组定义：当前有 i 个房屋，第 i 个房屋偷和不偷可以获取的最大数值
        // 状态转移方程： dp[i] = max(dp[i-1], dp[i-2] + nums[i])
        $dp = [];
        $dp[0] = reset($nums);
        $dp[1] = max($nums[0], $nums[1]);
        for ($i = 2; $i < $n; ++$i) {
            $dp[$i] = max($dp[$i - 1], $dp[$i - 2] + $nums[$i]);
        }
        return $dp[$n - 1];
    }


}