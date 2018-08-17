<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\ContentSecurityPolicy;

final class None implements IValue
{

	public function __toString(): string
	{
		return "'none'";
	}

}
