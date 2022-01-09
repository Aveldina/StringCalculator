<?php

namespace App\Service;

class StringCalculatorService
{
    public function add(string $input): int
    {
        if (strlen($input) == 0) {
            return 0;
        }

        $separatorControlCheck = substr($input, 0, 2);
        if (strcmp($separatorControlCheck, "//")  == 0) {
            $inputData = preg_split('/\n/', $input, 2, PREG_SPLIT_NO_EMPTY);
            $separatorString = substr($inputData[0], 2);
            $dataString = $inputData[1];
        }
        else {
            $separatorString = ',';
            $dataString = $input;
        }

        return $this->calculateValue($dataString, $separatorString);
    }

    private function calculateValue(string $input, string $separator = ','): int {
        $inputArray = explode($separator, $input);
        $sum = 0;
        foreach ($inputArray as $item) {
            $sum += intval($item);
        }
        return $sum;
    }
}
