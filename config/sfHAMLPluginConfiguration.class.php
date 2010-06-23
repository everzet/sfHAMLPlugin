<?php

/*
 * This file is part of the sfHAMLPlugin.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfHAMLPluginConfiguration implements plugin initialization & configuration.
 *
 * @package    sfHAMLPlugin
 * @subpackage configurations
 * @author     Konstantin Kudryashov <ever.zet@gmail.com>
 * @version    1.0.0
 */
class sfHAMLPluginConfiguration extends sfPluginConfiguration
{
  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    sfConfig::set('mod_global_partial_view_class', 'sfHAML');
  }
}