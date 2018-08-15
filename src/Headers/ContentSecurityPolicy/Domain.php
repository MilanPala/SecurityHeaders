<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\ContentSecurityPolicy;

final class Domain implements IValue
{

	/**
	 * @var string
	 */
	private $domain;


	public function __construct(string $domain)
	{
		$domainForCheck = $domain;

		if (\strpos($domain, '*.') === 0) {
			$domainForCheck = \substr($domainForCheck, 2);
		}

		if ( ! \Nette\Utils\Validators::isUrl('http://' . $domainForCheck)) {
			throw new \InvalidArgumentException(sprintf('Předaná doména "%s" není validní doéna', $domain));
		}

		$this->domain = $domain;
	}


	public function __toString(): string
	{
		return $this->domain;
	}

}
