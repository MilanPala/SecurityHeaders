<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\ContentSecurityPolicy;

final class Directive
{

	/**
	 * @var array|IValue[]
	 */
	private $values = [];


	public function addNonce(string $nonce): void
	{
		$this->values[] = new Nonce($nonce);
	}


	public function addSelf(): void
	{
		$this->values[] = new SelfValue();
	}


	public function addWildcard(): void
	{
		$this->values[] = new Wildcard();
	}


	public function addDomain(string $domain): void
	{
		$this->values[] = new Domain($domain);
	}


	public function addData(): void
	{
		$this->values[] = new Data();
	}


	public function addUnsafeEval(): void
	{
		$this->values[] = new UnsafeEval();
	}


	public function addUnsafeInline(): void
	{
		$this->values[] = new UnsafeInline();
	}


	public function addNone(): void
	{
		$this->values = [];
		$this->values[] = new None();
	}


	public function addHttps(): void
	{
		$this->values = [];
		$this->values[] = new Https();
	}


	public function __toString(): string
	{
		return \implode(' ', $this->values);
	}

}
