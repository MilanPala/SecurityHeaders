<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\XssProtection;

final class Header implements \Pd\SecurityHeaders\Headers\IHeader
{

	public function getName(): string
	{
		return 'X-Xss-Protection';
	}


	public function getValue(): string
	{
		return '1; mode=block';
	}

}
