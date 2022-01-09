<?php

namespace App\Tests\Service;

use App\Service\StringCalculatorService;
use PHPUnit\Framework\TestCase;

class StringCalculatorServiceTest extends TestCase
{
    private StringCalculatorService $service;

    protected function setUp(): void
    {
        $this->service = new StringCalculatorService();
    }

    /**
     * @dataProvider addReturnsExpectedProvider
     */
    public function testAddReturnsExpected(string $input, int $expected): void
    {
        $result = $this->service->add($input);

        $this->assertIsInt($result);
        $this->assertEquals($expected, $result);
    }

    public function testAddNegativeThrowsException() {
        $input = "1,-2,3";
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("-2");

        $this->service->add($input);
    }

    /**
     * @return array<int, array<int, mixed>>
     */
    public function addReturnsExpectedProvider(): array
    {
        return [
            ["1,2,5", 8],
            ["", 0],
            ["5,10,5", 20],
            ["999,1", 1000],
            ["1\n,2,3", 6],
            ["1,\n2,4", 7],
            ["1,\n\r2,4", 7],
            ["//;\n1;3;4", 8],
            ["//$\n1$2$3", 6],
            ["//@\n2@3@8", 13]
        ];
    }
}
