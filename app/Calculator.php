<?php

declare(strict_types=1);

namespace App;

use Webmozart\Assert\Assert;

final class Calculator
{
    /**
     * Calculates the increment for a not formatted number. When it has a thousands separator, it needs to be removed.
     * It calculates the increment though adding yearly the current amount to the investment
     * and multiplying that with the given percentage. This is done for every year that is given.
     *
     * @param float $investment Yearly investment amount, this must be a positive number.
     * @param int $totalYears Total years of investment, this must be filled as full years.
     * @param float $interestPercentage Positive or negative percentage, it may use decimals. min -99, max 100.00
     * @return float
     */
    public static function increment(float $investment, int $totalYears, float $interestPercentage): float
    {
        Assert::greaterThan($investment, 0);
        Assert::greaterThan($totalYears, 0);
        Assert::range($interestPercentage, -99, 100);

        $multiplier = round(1 + $interestPercentage / 100, 4);
        $result = 0.00;
        for ($year = 1; $year <= $totalYears; $year++) {
            $result = round(($result + $investment) * $multiplier, 2);
        }

        return $result;
    }
}
