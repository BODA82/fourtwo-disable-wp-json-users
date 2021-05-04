<?php
/*
Plugin Name: FourTwo - Disable WP REST API User Routes
Plugin URI: https://github.com/BODA82/fourtwo-disable-wp-json-users
Description: WordPress plugin that disables the "user" related routes in the WP JSON REST API. (example: /wp-json/wp/v2/users/)
Version: 1.0.0
Author: Christopher Spires
Author URI: https://github.com/BODA82
License: GPLv2
*/

/*  Copyright 2021 Christopher Spires (https://github.com/BODA82)

    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License
    as published by the Free Software Foundation; either version 2
    of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

add_filter('rest_endpoints', function($endpoints) {
	
    if (isset($endpoints['/wp/v2/users'])) {
        unset($endpoints['/wp/v2/users']);
    }
    
    if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }
    
    if (isset($endpoints['/wp/v2/users/me'])) {
        unset($endpoints['/wp/v2/users/me']);
    }
    
    return $endpoints;
    
});