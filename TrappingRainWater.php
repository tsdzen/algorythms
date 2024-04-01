<?php

class TrappingRainWater {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height)
    {
        $array = $height;//[0,0,0,1,0,2,1,0,1,3,2,1,2,1,0,0,0];
        return $this->findSol($array, 0);
    }

    function findSol($array, $res)
    {
        $this->trimArray($array);
        if (empty($array)) {
            return $res;
        }

        foreach($array as $i=>$el) {
            if ($el > 0) {
                $array[$i]=$el-1;
            } else {
                $res = $res + 1;
            }
        }
        return $this->findSol($array, $res);
    }

    function trimArray(&$array)
    {
        foreach($array as $elem) {
            if ($elem === 0) {
                array_shift($array);
                continue;
            }
            break;
        }

        $array = array_reverse($array);
        foreach($array as $elem) {
            if ($elem === 0) {
                array_shift($array);
                continue;
            }
            break;
        }
        $array = array_reverse($array);
    }
}