### Setup

Add the extension to the twig environment:

```php
// Configure Twig
$loader = new \Twig_Loader_Filesystem(JPATH_TEMPLATES);
$twig = new \Twig_Environment($loader, $options = array());

// Register Extension
$twig->addExtension(new \TwigJoomla\Extension\TextExtension);

// Render Template
$template = $twig->loadTemplate('test.twig');
echo $template->render();
```"# twig-language-extensions-for-joomla" 
