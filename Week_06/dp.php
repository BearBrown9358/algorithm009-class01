<?php


class dp
{

    /**
     * dp constructor.
     * @param $text1
     * @param $text2
     */
    public function dp($text1 ,$text2){
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
}