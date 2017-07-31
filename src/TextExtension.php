<?php
namespace TwigJoomla\Extension;

/**
 * Joomla Text bridge
 *
 * Available methods are '_'|'alt'|'plural'|'sprintf'|'printf'|'script'
 */
class TextExtension extends AbstractExtension
{
	/**
	 * @inheritDoc
	 */
	protected $jClass = '\\Joomla\\Language\\Text';

	/**
	 * @inheritDoc
	 */
	protected $defaultMethod = '_';

	/**
	 * @inheritDoc
	 */
	public function getName()
	{
		return 'jtext';
	}
}
