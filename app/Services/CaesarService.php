<?php

namespace App\Services;

class CaesarService
{
    public function encode(string $inputString, int $shift): string
    {
        $encodedString = '';
        foreach (str_split($inputString) as $char) {
            if (ctype_alpha($char)) {
                $asciiOffset = ctype_upper($char) ? 65 : 97;
                $encodedString .= chr((ord($char) + $shift - $asciiOffset) % 26 + $asciiOffset);
            } else {
                $encodedString .= $char;
            }
        }
        return $encodedString;
    }
}
