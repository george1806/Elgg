<?php
/**
 * Enables all installed plugins.
 *
 * All plugins in the mod/ directory are enabled and the views cache and simplecache
 * are reset.
 *
 * @package Elgg.Core
 * @subpackage Administration.Site
 */

$plugins = get_installed_plugins();

foreach ($plugins as $p => $data) {
	if (enable_plugin($p)) {
		elgg_delete_admin_notice('first_installation_plugin_reminder');
		system_message(elgg_echo('admin:plugins:enable:yes', array($p)));
	} else {
		register_error(elgg_echo('admin:plugins:enable:no', array($p)));
	}
}

// don't regenerate the simplecache because the plugin won't be
// loaded until next run.  Just invalidate and let it regnerate as needed
elgg_invalidate_simplecache();
elgg_filepath_cache_reset();

forward(REFERER);