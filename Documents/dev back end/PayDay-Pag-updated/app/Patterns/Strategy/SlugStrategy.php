<?php

namespace App\Patterns\Strategy;

use Illuminate\Support\Str;

class SlugStrategy implements NameStrategyInterface
{
    public function format(string $name): string
    {
        return Str::slug($name);
    }
}
