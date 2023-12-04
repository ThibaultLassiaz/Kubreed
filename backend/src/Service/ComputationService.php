<?php

namespace App\Service;

final class ComputationService
{
    public function __construct()
    {
    }

    /**
     * @param array<string>     $array1
     * @param array<string>     $array2
     * @param array<int, mixed> $currentCombination
     *
     * @return array<int, mixed>
     */
    public function generateCombinations(array $array1, array $array2, int $index = 0, array $currentCombination = []): array
    {
        if ($index === max(count($array1), count($array2))) {
            return [$currentCombination];
        }

        $combinations = [];

        if ($index < count($array1) && !in_array($array1[$index], $currentCombination)) {
            $combinations = array_merge(
                $combinations,
                $this->generateCombinations($array1, $array2, $index + 1, [...$currentCombination, $array1[$index]])
            );
        }

        if ($index < count($array2) && !in_array($array2[$index], $currentCombination)) {
            $combinations = array_merge(
                $combinations,
                $this->generateCombinations($array1, $array2, $index + 1, [...$currentCombination, $array2[$index]])
            );
        }

        return array_map('unserialize', array_unique(array_map('serialize', $combinations)));
    }
}
