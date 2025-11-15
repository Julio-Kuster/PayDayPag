<?php

namespace App\Patterns\Strategy;

class NameContext
{
	protected NameStrategyInterface $strategy;

	public function __construct(NameStrategyInterface $strategy)
	{
		$this->strategy = $strategy;
	}

	public function setStrategy(NameStrategyInterface $strategy): void
	{
		$this->strategy = $strategy;
	}

	public function execute(string $name): string
	{
		return $this->strategy->format($name);
	}
}


