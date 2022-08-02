<?php

namespace App\Utils;

class Generate
{
    /**
     * @param int $size
     * @param bool $capitalLetters
     * @param bool $numbers
     * @param bool $symbol
     * @return string
     */
    public static function newPassword(
        int $size = 8,
        bool $capitalLetters = true,
        bool $numbers = true,
        bool $symbol = false
    ) :string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $return = '';
        if ($capitalLetters){
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($numbers){
            $characters .= '1234567890';
        }
        if ($symbol){
            $characters .= '!@#$%*-';
        }
        $len = strlen($characters);
        for ($n = 1; $n <= $size; $n++) {
            $rand = mt_rand(1, $len);
            $return .= $characters[$rand - 1];
        }
        return $return;
    }
}
