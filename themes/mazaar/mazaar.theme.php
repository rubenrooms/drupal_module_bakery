<?php

/**
 * @file
 * template.php
 */

// Add these when/if needed
use Drupal\Component\Utility\Html;
use Drupal\Core\Template\Attribute;
use Drupal\Core\Url;
use Drupal\media\Entity\Media;

// add functions below

/**
 * Implements hook_preprocess_HOOK() for menu.html.twig.
 */
function mazaar_preprocess_menu(&$variables) {

  var_dump($variables);
  var_dump($variables['main_menu']);

  dsm($variables);
}
