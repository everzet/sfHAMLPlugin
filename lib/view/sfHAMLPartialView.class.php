<?php

error_reporting(E_ALL ^ !E_STRICT);
require_once dirname(__FILE__) . '/../vendor/phphaml/includes/haml/HamlParser.class.php';

/*
 * This file is part of the sfHAMLPlugin.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfHAML implements view, that uses HAML as template engine.
 *
 * @package    sfHAMLPlugin
 * @subpackage view
 * @author     Konstantin Kudryashov <ever.zet@gmail.com>
 * @version    1.0.0
 */
class sfHAMLPartialView extends sfPartialView
{
  /**
   * @var sfHamlParser
   */
  protected $parser;

  /**
   * @var String extension used by HAML templates which is .haml by default
   */
  protected $extension = '.haml';

  public function configure()
  {
    parent::configure();

    $this->parser = new sfHAMLParser(sfConfig::get('sf_template_cache_dir'));
  }

  protected function renderFile($file)
  {
    if (sfConfig::get('sf_logging_enabled', false))
    {
      $this->dispatcher->notify(
        new sfEvent($this, 'application.log', array(sprintf('Render "%s"', $file)))
      );
    }
    $this->loadCoreAndStandardHelpers();

    return $this->parser->render($file, $this->attributeHolder->toArray());
  }
}