<?php

/**
 * This filter allows you to set which column should be used to sort by as a default.
 */

/**
 * Usage of the hook
 *
 * @param array $args
 * @param AC\ListScreen ListScreen
 *
 * @return array
 */
function acp_sorting_default($args, AC\ListScreen $list_screen)
{
    // Change the default sorted column
    // $args[0] = 'column_name';

    // Change sorting to descending `true` or ascending `false`
    // $args[1] = true;

    return $args;
}

add_filter('acp/sorting/default', 'acp_sorting_default', 10, 2);

/**
 * Change the default sorting of a Posts list table to another column
 *
 * @param array $args
 * @param AC\ListScreen ListScreen
 *
 * @return array
 */
function acp_sorting_default_posts_list_table($args, AC\ListScreen $list_screen)
{
    if ('post' === $list_screen->get_key()) {
        // You can find the column `Name` (e.g. '5eec834e359d4') by hovering over the `Type` label within the column settings menu.
        $args[0] = '5eec834e359d4';

        // Change to ascending
        $args[1] = false;
    }

    return $args;
}

add_filter('acp/sorting/default', 'acp_sorting_default_posts_list_table', 10, 2);