<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 *
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */


/**
 * Implements hook_preprocess_HOOK().
 */
function spyder_byte_design_preprocess_page(&$variables) {
  if (!empty($variables['is_front'])) {
    drupal_add_js(drupal_get_path('theme', 'spyder_byte_design') . '/js/droplets.js', 'file');
  }
}

/**
 * Implements hook_preprocess_HOOK().
 */
function spyder_byte_design_preprocess_html(&$variables) {
  drupal_add_css('http://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister', array('type' => 'external'));
}
