<?php

namespace App\Service;

class StringCalculatorService
{
    private const MAX_ALLOWED_NUMBER = 1000;

    public function add(string $input): int
    {
        if (0 == strlen($input)) {
            return 0;
        }

        $separatorControlCheck = substr($input, 0, 2);
        if (0 == strcmp($separatorControlCheck, '//')) {
            $inputData = preg_split('/\R/m', $input, 2, PREG_SPLIT_NO_EMPTY);
            if (false == $inputData || 2 != count($inputData)) {
                throw new \Exception('Incorrect input string format');
            }
            $separatorString = substr($inputData[0], 2);
            $dataString = $inputData[1];
        } else {
            $separatorString = ',';
            $dataString = $input;
        }

        return $this->calculateValue($dataString, $separatorString);
    }

    private function calculateValue(string $input, string $separator = ','): int
    {
        $inputArray = explode($separator, $input);
        $sum = 0;
        foreach ($inputArray as $item) {
            $item = intval($item);
            if ($item < 0) {
                throw new \Exception((string) $item);
            }
            if ($item <= self::MAX_ALLOWED_NUMBER) {
                $sum += $item;
            }
        }

        return $sum;
    }
}
