<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers;

interface IHeader
{

	public function getName(): string;

	public function getValue(): string;

}
