<?php

namespace App\Tests\Service;

use App\Service\StringCalculatorService;
use PHPUnit\Framework\TestCase;

class StringCalculatorServiceTest extends TestCase
{
    public function testStringCalculatorServiceSetup(): void {
        $stringCalculatorService = new StringCalculatorService();

        $result = $stringCalculatorService->outputTest();
        $this->assertIsString($result);
    }

}