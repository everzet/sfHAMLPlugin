<?php

/*
 * This file is part of the sfHAMLPlugin.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfHAMLParser implements parsing routines.
 *
 * @package    sfHAMLPlugin
 * @subpackage parser
 * @author     Konstantin Kudryashov <ever.zet@gmail.com>
 * @version    1.0.0
 */
class sfHAMLParser
{
  protected $parser;

  public function __construct($cache_path)
  {
    $this->parser = new HamlParser(false, $cache_path);

    $this->parser->addCustomBlock('slot', 'end_slot');
    $this->parser->addCustomBlock('javascript_tag', 'end_javascript_tag');
    $this->parser->addCustomBlock('if_javascript', 'end_if_javascript');
    $this->parser->addCustomBlock('if_javascript', 'end_if_javascript');

    $this->parser->registerBlock('javascript_tag', 'javascript');
  }

  public function render($file, array $values)
  {
    $this->parser->setFile($file);
    $this->parser->append($values);

    return $this->parser->render();
  }
}