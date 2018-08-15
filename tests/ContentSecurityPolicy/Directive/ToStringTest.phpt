<?php declare(strict_types = 1);

namespace PdTests\SecurityHeaders\Headers\ContentSecurityPolicy\Directive;

include __DIR__ . '/../../bootstrap.php';

final class ToStringTest extends \Tester\TestCase
{

	public function testHeaderWithManyValues(): void
	{
		$directive = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Directive();
		$directive->setData();
		$directive->setSelf();

		\Tester\Assert::equal("data: 'self'", (string) $directive);
	}


	public function testOneValue(): void
	{
		$directive = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Directive();
		$directive->setData();

		\Tester\Assert::equal('data:', (string) $directive);
	}


	public function testNoneOnlyOnce(): void
	{
		$directive = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Directive();
		$directive->setNone();

		$cb = function () use ($directive): void {
			$directive->setNone();
		};
		\Tester\Assert::exception($cb, \InvalidArgumentException::class);

		\Tester\Assert::equal("'none'", (string) $directive);
	}


	public function testNoneAndSomethingElse(): void
	{
		$directive = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Directive();
		$directive->setNone();

		$cb = function () use ($directive): void {
			$directive->setData();
		};
		\Tester\Assert::exception($cb, \InvalidArgumentException::class);

		\Tester\Assert::equal("'none'", (string) $directive);
	}


	public function testSomethingElseAndNone(): void
	{
		$directive = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Directive();
		$directive->setData();
		$directive->setNone();

		\Tester\Assert::equal("'none'", (string) $directive);
	}


	public function testDataTwice(): void
	{
		$directive = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Directive();
		$directive->setData();
		$directive->setData();

		\Tester\Assert::equal("data:", (string) $directive);
	}

}

(new ToStringTest())->run();


