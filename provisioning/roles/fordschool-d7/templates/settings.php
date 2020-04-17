<?php

/**
 * @file
 * Contains custom Drupal configurations for your local environment. This file
 * is in .gitignore, so hack away. It'll never make it to production.
 *
 * Like any settings.php file, be aware that Drupal is not yet bootstrapped.
 */

/**
 * Perform configuration changes within a closure to prevent unnecessary global
 * namespace variable leakage, and to be explicit in what we are affecting.
 */
call_user_func(function() use (&$conf, &$databases, &$base_url) {

  /**
   * Define the database connection.
   */
  $databases = [
    'default' => [
      'default' => [
        'driver' => 'mysql',
        'database' => 'fordschool_drupal7',
        'username' => 'root',
        'password' => 'root',
        'host' => '127.0.0.1',
        'port' => '3306',
        'prefix' => '',
      ],
    ],
  ];

  /**
   * Hard-code the base-url.
   */
  $base_url = 'http://d7.fordschool.local';

  /**
   * Enable context debug reaction.
   */
  $conf['context_reaction_debug_enable_global'] = TRUE;

  /**
   * Don't preprocess CSS/JS
   */
  $conf['preprocess_css'] = FALSE;                    // Optimize css.
  $conf['preprocess_js'] = FALSE;                     // Optimize javascript.
});
