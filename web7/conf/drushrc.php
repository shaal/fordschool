<?php
/**
 * @file
 * Project-specific drush configuration.
 *
 * This file can be used with `drush -c conf/drushrc.php`
 */

exec('git rev-parse --show-toplevel 2> /dev/null', $output);
if (!empty($output)) {
  $repo = current($output);

  # Configure Drush for the current project.
  $options['include'] = "{$repo}/drush";
  $options['alias-path'] = "{$repo}/drush";
}

/**
 * Using the flag "--structure-tables-key=common" on sql-dump and sql-sync will cause
 * the structure but not the data to be dumped for these tables.
 */
$options['structure-tables']['common'] = array('cache', 'cache_*', 'history', 'search_*', 'sessions', 'watchdog');
