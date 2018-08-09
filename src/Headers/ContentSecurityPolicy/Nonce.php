<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\ContentSecurityPolicy;

final class Nonce implements IValue
{

	/**
	 * @var string
	 */
	private $nonce;


	public function __construct(string $nonce)
	{
		$this->nonce = $nonce;
	}


	public function __toString(): string
	{
		return 'nonce-' . $this->nonce;
	}

}
