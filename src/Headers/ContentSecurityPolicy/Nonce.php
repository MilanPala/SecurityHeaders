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
		if ( ! \preg_match('~^[a-zA-Z0-9+/]+$~', $nonce)) {
			throw new \InvalidArgumentException('Nonce musí obsahovat písmena, číslice, + a /');
		}

		$this->nonce = $nonce;
	}


	public function __toString(): string
	{
		return 'nonce-' . $this->nonce;
	}

}
