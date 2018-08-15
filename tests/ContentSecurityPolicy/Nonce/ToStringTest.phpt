<?php declare(strict_types = 1);

namespace PdTests\SecurityHeaders\Headers\ContentSecurityPolicy\Nonce;

include __DIR__ . '/../../bootstrap.php';

final class ToStringTest extends \Tester\TestCase
{

	public function testRightInput(): void
	{
		$nonce = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Nonce('123456789asfdfASDF+/');

		\Tester\Assert::equal("nonce-123456789asfdfASDF+/", (string) $nonce);
	}


	public function testWrongInput(): void
	{
		$cb = function () {
			new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Nonce('123456789*');
		};

		\Tester\Assert::exception($cb, \InvalidArgumentException::class);
	}

}

(new ToStringTest())->run();


