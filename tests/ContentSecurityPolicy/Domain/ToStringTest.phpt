<?php declare(strict_types = 1);

namespace PdTests\SecurityHeaders\Headers\ContentSecurityPolicy\Domain;

include __DIR__ . '/../../bootstrap.php';

final class ToStringTest extends \Tester\TestCase
{

	public function testRightInput(): void
	{
		$nonce = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Domain('domena.cz');

		\Tester\Assert::equal("domena.cz", (string) $nonce);

		$nonce = new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Domain('*.domena.cz');

		\Tester\Assert::equal("*.domena.cz", (string) $nonce);
	}


	public function testWrongInput(): void
	{
		$cb = function () {
			new \Pd\SecurityHeaders\Headers\ContentSecurityPolicy\Domain('http://domena.cz');
		};

		\Tester\Assert::exception($cb, \InvalidArgumentException::class);
	}

}

(new ToStringTest())->run();


