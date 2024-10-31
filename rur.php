<?php /*
**************************************************************************

Plugin Name:  RUR Currency Sign
Plugin URI:   http://danielnewman.ru/
Description:  Implements <a href="http://ru.wikipedia.org/wiki/Знак_рубля">Russian rubble sign</a> shortcode in posts. Requires WordPress 2.5+ or WPMU 1.5+.
Version:      1.0
Author:       Daniel Newman
Author URI:   http://danielnewman.ru/

**************************************************************************

Copyright (C) 2010 Daniel Newman

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

**************************************************************************/

class RUR {

	function RUR() {
		if ( !function_exists('add_shortcode') ) return;
		add_shortcode( 'p' , array(&$this, 'shortcode_rur') );
		add_shortcode( 'rur' , array(&$this, 'shortcode_rur') );
	}


	function shortcode_rur() {
		return '<span class="rur">р<span>уб.</span></span>';
	}

}

function RUR_style_init() {?>
	<link rel="stylesheet" type="text/css" href="<?= get_bloginfo('wpurl')?>/wp-content/plugins/rur/rur.css">
<?php }


add_action('plugins_loaded', create_function( '', 'global $RUR; $RUR = new RUR();' ) );
add_action('wp_head', 'RUR_style_init');
?>
