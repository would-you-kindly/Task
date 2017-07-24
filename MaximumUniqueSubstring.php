<?php

class MaximumUniqueSubstring
{
    public function findMaximumUniqueSubstring($str)
    {
        $subStrLast = "";
        $subStr = "";
        $length = strlen($str);
        for ($i = 0; $i < $length; $i++) {
            if (false === $pos = strpos($subStr, $str[$i])) {
                $subStr .= $str[$i];
            } else {
                if (strlen($subStr) > strlen($subStrLast)) {
                    $subStrLast = $subStr;
                }
                $subStr = substr($subStr, $pos + 1) . $str[$i];
            }
        }
        if (strlen($subStr) < strlen($subStrLast)) {
            $subStr = $subStrLast;
        }
        return $subStr;
    }
}

?>