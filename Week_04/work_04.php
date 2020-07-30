<?php


class work_04
{
    /**
     * 单词接龙 127
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList)
    {
        if (!in_array($endWord, $wordList)) return 0;
        $wordKv = array_flip($wordList);
        $s1[]   = $beginWord;
        $s2[]   = $endWord; // 双向BFS
        $n      = strlen($beginWord);
        $step   = 0;
        while (!empty($s1)) {
            $step++;
            if (count($s1) > count($s2)) {//依次双向BFS实现,始终使用变量s1去运算。
                $tmp = $s1;
                $s1  = $s2;
                $s2  = $tmp;
            }
            $s = [];
            foreach ($s1 as $word_1) {
                for ($i = 0; $i < $n; $i++) {
                    $word1 = $word_1;
                    for ($ch = ord('a'); $ch <= ord('z'); $ch++) {
                        $word1[$i] = chr($ch);
                        if (in_array($word1, $s2)) return $step + 1;
                        if (!array_key_exists($word1, $wordKv)) continue;
                        unset($wordKv[$word1]);
                        $s[] = $word1;
                    }
                }
            }
            $s1 = $s;
        }
        return 0;
    }

    /**
     * 200 岛屿数量问题
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid)
    {
        $rows = count($grid);
        if ($rows == 0) return 0;
        $cols  = count($grid[0]);
        $count = 0;
        // 四个方向数组
        $directions = [[-1, 0], [0, -1], [1, 0], [0, 1]];
        // 辅助队列
        $queue = new SplQueue();
        // 访问数组
        $visited = array_fill(0, $rows, array_fill(0, $cols, false));
        for ($i = 0; $i < $rows; ++$i) {
            for ($j = 0; $j < $cols; ++$j) {
                if (!$visited[$i][$j] && $grid[$i][$j] == '1') {
                    $count++;
                    $visited[$i][$j] = true;
                    $queue->enqueue($i * $cols + $j);
                    while ($queue->count()) {
                        $cur = $queue->dequeue();
                        $x   = (int)($cur / $cols);
                        $y   = $cur % $cols;
                        for ($k = 0; $k < 4; ++$k) {
                            $newX = $x + $directions[$k][0];
                            $newY = $y + $directions[$k][1];
                            if ($this->inArea($newX, $newY, $grid)
                                && !$visited[$newX][$newY]
                                && $grid[$newX][$newY] == '1'
                            ) {
                                $visited[$newX][$newY] = true;
                                $queue->enqueue($newX * $cols + $newY);
                            }
                        }
                    }
                }
            }
        }
        return $count;
    }

    private function inArea($x, $y, $grid)
    {
        if ($x < 0 || $y < 0) return false;
        if ($x >= count($grid) || $y >= count($grid[0])) return false;

        return true;
    }
}