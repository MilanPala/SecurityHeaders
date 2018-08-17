<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\ContentSecurityPolicy;

final class UnsafeEval implements IValue
{

	public function __toString(): string
	{
		return "'unsafe-eval'";
	}

}
