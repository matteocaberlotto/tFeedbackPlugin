<?php

/**
 * tFeedbackPlugin configuration.
 *
 * @package     tFeedbackPlugin
 * @subpackage  config
 * @author      Your name here
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class tFeedbackPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '0.0.1-ALPHA';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
      sfConfig::set('sf_enabled_modules', array_merge(sfConfig::get('sf_enabled_modules', array()), array('tFeedbackPages')));
  }
}
