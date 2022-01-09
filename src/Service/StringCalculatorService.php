<?php

namespace App\Service;

class StringCalculatorService
{
    public function add(string $input): int
    {
        $separator = ',';
        if (strlen($input) == 0) {
            return 0;
        }

        $inputArray = explode($separator, $input);
        $sum = 0;
        foreach ($inputArray as $item) {
            $sum += intval($item);
        }
        return $sum;
    }
}
