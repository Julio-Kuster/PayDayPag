<?php

namespace App\Patterns\Strategy;

class UpperCaseStrategy implements NameStrategyInterface
{
	public function format(string $name): string
	{
		return mb_strtoupper($name);
	}
}


