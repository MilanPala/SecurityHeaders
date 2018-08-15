<?php declare(strict_types = 1);

namespace PdTests\SecurityHeaders\Headers\ContentSecurityPolicy\Header;

include __DIR__ . '/../../bootstrap.php';

final class ToStringTest extends \Tester\TestCase
{

	public function testHeaderWithManyDirectives(): void
	{
		$header = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Header();

		$directive = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Directive();
		$directive->setData();
		$directive->setSelf();
		$header->setDefaultSrc($directive);

		$directive = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Directive();
		$directive->setWildcard();
		$header->setScriptSrc($directive);

		\Tester\Assert::equal("Content-Security-Policy", $header->getName());
		\Tester\Assert::equal("default-src data: 'self'; script-src *", $header->getValue());
	}


	public function testOnlyDefault(): void
	{
		$header = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Header();

		$directive = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Directive();
		$directive->setData();
		$directive->setSelf();
		$header->setDefaultSrc($directive);

		\Tester\Assert::equal("Content-Security-Policy", $header->getName());
		\Tester\Assert::equal("default-src data: 'self'", $header->getValue());
	}

}

(new ToStringTest())->run();


