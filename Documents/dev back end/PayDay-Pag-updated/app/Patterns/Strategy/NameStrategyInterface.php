<?php

namespace App\Patterns\Strategy;

interface NameStrategyInterface
{
    public function format(string $name): string;
}
