<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\ReferrerPolicy;

final class Header implements \Pd\SecurityHeaders\Headers\IHeader
{

	public const UNSAFE_URL = 'unsafe-url';
	public const NO_REFERRER = 'no-referrer';
	public const NO_REFERRER_WHEN_DOWNGRADE = 'no-referrer-when-downgrade';

	private const VALUES = [
		self::NO_REFERRER,
		self::UNSAFE_URL,
		self::NO_REFERRER_WHEN_DOWNGRADE,
	];

	/**
	 * @var string
	 */
	private $value;


	public function __construct(string $value)
	{
		if ( ! \in_array($value, self::VALUES, TRUE)) {
			throw new \InvalidArgumentException(\sprintf('Hodnota "%s" není mezi povolenými: %s', $value, \implode(', ', self::VALUES)));
		}

		$this->value = $value;
	}


	public function getName(): string
	{
		return 'Referrer-Policy';
	}


	public function getValue(): string
	{
		return $this->value;
	}

}
