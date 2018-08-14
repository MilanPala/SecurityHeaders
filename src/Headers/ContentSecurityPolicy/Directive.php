<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\ContentSecurityPolicy;

final class Directive
{

	/**
	 * @var array|IValue[]
	 */
	private $values = [];

	/**
	 * @var bool
	 */
	private $hasNone = FALSE;


	public function addNonce(string $nonce): void
	{
		$this->addToValues(new Nonce($nonce));
	}


	public function addSelf(): void
	{
		$this->addToValues(new SelfValue());
	}


	public function addWildcard(): void
	{
		$this->addToValues(new Wildcard());
	}


	public function addDomain(string $domain): void
	{
		$this->values[] = new Domain($domain);
	}


	public function addData(): void
	{
		$this->addToValues(new Data());
	}


	public function addUnsafeEval(): void
	{
		$this->addToValues(new UnsafeEval());
	}


	public function addUnsafeInline(): void
	{
		$this->addToValues(new UnsafeInline());
	}


	public function addNone(): void
	{
		$this->addToValues(new None());
	}


	public function addHttps(): void
	{
		$this->addToValues(new Https());
	}


	private function addToValues(IValue $value): void
	{
		if ($this->hasNone) {
			throw new \InvalidArgumentException(\sprintf('Hodnota "%s" je už nastavená', (string) (new None())));
		}

		if ($value instanceof None) {
			$this->hasNone = TRUE;
			$this->values = [];
		}

		$this->values[] = $value;
	}


	public function __toString(): string
	{
		return \implode(' ', $this->values);
	}

}
