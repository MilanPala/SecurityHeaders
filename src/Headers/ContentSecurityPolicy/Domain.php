<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\ContentSecurityPolicy;

final class Domain implements IValue
{

	private string $domain;


	public function __construct(string $domain)
	{
		$this->domain = $domain;
	}


	public function __toString(): string
	{
		return $this->domain;
	}

}
