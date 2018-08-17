<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\ContentSecurityPolicy;

final class UnsafeInline implements IValue
{

	public function __toString(): string
	{
		return "'unsafe-inline'";
	}

}
