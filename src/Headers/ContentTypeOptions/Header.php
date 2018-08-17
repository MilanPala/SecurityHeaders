<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\ContentTypeOptions;

final class Header implements \Pd\SecurityHeaders\Headers\IHeader
{

	public function getName(): string
	{
		return 'X-Content-Type-Options';
	}


	public function getValue(): string
	{
		return 'nosniff';
	}

}
