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

	/**
	 * @var bool
	 */
	private $hasSelf = FALSE;

	/**
	 * @var bool
	 */
	private $hasWildcard = FALSE;

	/**
	 * @var bool
	 */
	private $hasData = FALSE;

	/**
	 * @var bool
	 */
	private $hasUnsafeEval = FALSE;

	/**
	 * @var bool
	 */
	private $hasUnsafeInline = FALSE;

	/**
	 * @var bool
	 */
	private $hasHttps = FALSE;


	public function addNonce(string $nonce): void
	{
		$this->addToValues(new Nonce($nonce));
	}


	public function setSelf(): void
	{
		if ($this->hasSelf) {
			return;
		}
		$this->addToValues(new SelfValue());
		$this->hasSelf = TRUE;
	}


	public function setWildcard(): void
	{
		if ($this->hasWildcard) {
			return;
		}
		$this->addToValues(new Wildcard());
		$this->hasWildcard = TRUE;
	}


	public function addDomain(string $domain): void
	{
		$this->values[] = new Domain($domain);
	}


	public function setData(): void
	{
		if ($this->hasData) {
			return;
		}
		$this->addToValues(new Data());
		$this->hasData = TRUE;
	}


	public function setUnsafeEval(): void
	{
		if ($this->hasUnsafeEval) {
			return;
		}
		$this->addToValues(new UnsafeEval());
		$this->hasUnsafeEval = TRUE;
	}


	public function setUnsafeInline(): void
	{
		if ($this->hasUnsafeInline) {
			return;
		}
		$this->addToValues(new UnsafeInline());
		$this->hasUnsafeInline = TRUE;
	}


	public function setNone(): void
	{
		$this->addToValues(new None());
	}


	public function setHttps(): void
	{
		if ($this->hasHttps) {
			return;
		}
		$this->addToValues(new Https());
		$this->hasHttps = TRUE;
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
