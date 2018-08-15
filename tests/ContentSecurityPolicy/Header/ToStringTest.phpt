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


	public function testBlockAllMixedContent(): void
	{
		$header = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Header();
		$header->setBlockAllMixedContent();
		\Tester\Assert::equal('block-all-mixed-content', $header->getValue());

		$directive = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Directive();
		$directive->setSelf();
		$header->setDefaultSrc($directive);
		\Tester\Assert::equal("default-src 'self'; block-all-mixed-content", $header->getValue());
	}


	public function testUpgradeInsecureRequest(): void
	{
		$header = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Header();
		$header->setUpgradeInsecureRequests();
		\Tester\Assert::equal('upgrade-insecure-requests', $header->getValue());

		$directive = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Directive();
		$directive->setSelf();
		$header->setDefaultSrc($directive);
		\Tester\Assert::equal("default-src 'self'; upgrade-insecure-requests", $header->getValue());
	}

}

(new ToStringTest())->run();


