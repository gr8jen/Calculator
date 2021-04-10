<?php

namespace Tests\Unit;

use App\Calculator;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\InvalidArgumentException;

final class CalculatorTest extends TestCase
{
    /** @dataProvider passesProvider */
    public function testCalculateIncrementPasses(
        float $investment,
        int $totalYears,
        float $interestPercentage,
        float $expected
    ): void {
        self::assertEquals($expected, Calculator::increment($investment, $totalYears, $interestPercentage));
    }

    public function passesProvider(): array
    {
        return [
            ' 500 for  1 year  with   2.0% interest' => [500.00, 1, 2.0, 510.00],
            ' 500 for 10 years with   2.0% interest' => [500.00, 10, 2.0, 5584.36],
            ' 500 for 10 years with   4.0% interest' => [500.00, 10, 4.0, 6243.18],
            '1000 for 10 years with   2.0% interest' => [1000.00, 10, 2.0, 11168.71],
            '1000 for 10 years with   4.0% interest' => [1000.00, 10, 4.0, 12486.34],
            '1000 for 10 years with  10.0% interest' => [1000.00, 10, 10.0, 17531.17],

            '1000 for  1 years with -50% interest' => [1000.00, 1, -50.0, 500.00],
            '1000 for  5 years with -50% interest' => [1000.00, 5, -50.0, 968.75],

        ];
    }

    /** @dataProvider failsProvider */
    public function testCalculateIncrementThrowsException(
        float $investment,
        int $totalYears,
        float $interestPercentage,
        string $expected
    ): void {
        $this->expectException($expected);
        Calculator::increment($investment, $totalYears, $interestPercentage);
    }

    public function failsProvider(): array
    {
        return [
            '   0 for  1 year  with   2.0% interest' => [0, 1, 2.0, InvalidArgumentException::class],
            ' 500 for  0 years with   2.0% interest' => [500.00, 0, 2.0, InvalidArgumentException::class],
            ' 500 for 10 years with 100.1% interest' => [500.00, 10, 100.1, InvalidArgumentException::class],
            '1000 for 10 years with-100.0% interest' => [1000.00, 10, -100.0, InvalidArgumentException::class],
        ];
    }
}
