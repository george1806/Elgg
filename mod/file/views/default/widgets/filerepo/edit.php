<?php
/**
 * Elgg file widget edit view
 *
 * @package ElggFile
 */

$widget = elgg_extract('entity', $vars);
// set default value
if (!isset($widget->num_display)) {
	$widget->num_display = 4;
}

echo elgg_view('object/widget/edit/num_display', [
	'entity' => $widget,
	'options' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 20],
	'label' => elgg_echo('file:num_files'),
]);
