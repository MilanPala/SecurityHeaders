<?php declare(strict_types = 1);

namespace PdTests\SecurityHeaders\ContentSecurityPolicy\Nonce;

include __DIR__ . '/../../bootstrap.php';

final class ToStringTest extends \Tester\TestCase
{

	public function testHeaderWithManyDirectives(): void
	{
		$nonce = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Nonce('123456789');

		\Tester\Assert::equal("nonce-123456789", (string) $nonce);
	}

}

(new ToStringTest())->run();


