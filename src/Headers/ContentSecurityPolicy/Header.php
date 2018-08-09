<?php declare(strict_types = 1);

namespace Pd\SecurityHeaders\Headers\ContentSecurityPolicy;

final class Header implements \Pd\SecurityHeaders\Headers\IHeader
{

	/**
	 * @var Directive|null
	 */
	private $defaultSrc;

	/**
	 * @var array|Directive[]
	 */
	private $directives = [];

	/**
	 * @var bool
	 */
	private $blockAllMixedContent;


	public function getName(): string
	{
		return 'Content-Security-Policy';
	}


	public function getValue(): string
	{
		$directives[] = $this->defaultSrc ? ('default-src ' . $this->defaultSrc) : '';

		foreach ($this->directives as $directiveName => $directiveValues) {
			$directives[] = $directiveName . ' ' . $directiveValues;
		}

		return \implode('; ', $directives) . ($this->blockAllMixedContent ? '; block-all-mixed-content' : '');
	}


	public function setDefaultSrc(Directive $directive): void
	{
		$this->defaultSrc = $directive;
	}


	public function setScriptSrc(Directive $directive): void
	{
		$this->directives['script-src'] = $directive;
	}


	public function setStyleSrc(Directive $directive): void
	{
		$this->directives['styles-src'] = $directive;
	}


	public function setChildSrc(Directive $directive): void
	{
		$this->directives['child-src'] = $directive;
	}


	public function setConnectSrc(Directive $directive): void
	{
		$this->directives['connect-src'] = $directive;
	}


	public function setFrameSrc(Directive $directive): void
	{
		$this->directives['frame-src'] = $directive;
	}


	public function setBlockAllMixedContent(): void
	{
		$this->blockAllMixedContent = TRUE;
	}

}
