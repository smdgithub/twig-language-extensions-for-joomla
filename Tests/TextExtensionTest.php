<?php

namespace TwigJoomla\Extension;

use Joomla\Language\Language;
use Joomla\Language\Text;

class TextExtensionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var TextExtension instance
	 */
	protected $object;

	/**
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->object = new TextExtension;

		// Use Joomla language files
		defined('JPATH_ROOT') or define('JPATH_ROOT', __DIR__);
	}

	/**
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	/**
	 * @dataProvider getParseEnglishTextTests
	 */
	public function testParseEnglishText($template, $expected, $context = array())
	{
		// Load en-GB.test.ini
		$englishLanguage = Language::getInstance('en-GB');
		$englishLanguage->load('test', __DIR__);

		Text::setLanguage($englishLanguage);

		$this->assertEquals($expected, $this->getTemplate($template)->render($context));

		return;
	}

	/**
	 * @dataProvider getParseCzechTextTests
	 */
	public function testParseChechText($template, $expected, $context = array())
	{
		// Load cs-CZ.test.ini
		$czechLanguage = Language::getInstance('cs-CZ');
		$czechLanguage->load('test', __DIR__);

		Text::setLanguage($czechLanguage);

		$this->assertEquals($expected, $this->getTemplate($template)->render($context));

		return;
	}

	/**
	 * Get Data sets
	 *
	 * @return array
	 */
	public function getParseEnglishTextTests()
	{
		return array(
			array('{{ "HELLO"|jtext }}', 'Hello'),
			array('{{ "HELLOW"|jtext(\'sprintf\', \'World\') }}', 'Hello World!'),
		);
	}

	/**
	 * Get Data sets
	 *
	 * @return array
	 */
	public function getParseCzechTextTests()
	{
		return array(
			array('{{ "HELLO"|jtext }}', 'Ahoj'),
			array('{{ "HELLOW"|jtext(\'sprintf\', \'světe\') }}', 'Ahoj světe!'),
		);
	}

	/**
	 * Setup Twig and prepare template
	 *
	 * @param string Template body
	 *
	 * @return object TwigTemplate object
	 */
	protected function getTemplate($template)
	{
		$loader = new \Twig_Loader_Array(array('index' => $template));
		$twig = new \Twig_Environment($loader, array('debug' => true, 'cache' => false));
		$twig->addExtension($this->object);

		return $twig->loadTemplate('index');
	}
}
