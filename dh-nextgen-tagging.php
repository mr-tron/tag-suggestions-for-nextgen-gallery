<?php
/*
Plugin Name: D Hill's Tag Plugin for NextGen Gallery
Plugin URI: http://www.davidhill.ie
Description: Adds autosuggestions for tags when tagging images in NextGen Gallery.
Version: 1.0
Author: David Hill
Author URI: http://www.davidhill.ie
License: GPL2
*/

/*  Copyright 2011  David Hill  (email : david@davidhill.ie)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function dh_load_scripts() { 

wp_register_script('dh-ngg-tag', plugins_url('/js/tag.js', __FILE__ ), array('jquery'), '');
wp_register_script('dh-ngg-tagging', plugins_url('/js/tagging.js', __FILE__ ), array('jquery'), '');
wp_register_style('dh-ngg-tag-style', plugins_url('/css/tag-style.css', __FILE__ ));



	if (isset($_GET['page'])) {

		if($_GET['page'] == 'nggallery-manage-gallery') {
		
			if(isset($_GET['mode'])) {

				wp_enqueue_script( 'dh-ngg-tag' );
				wp_enqueue_script( 'dh-ngg-tagging' );
				wp_enqueue_style('dh-ngg-tag-style');
						
			}
		}
	}
}

add_action('admin_enqueue_scripts','dh_load_scripts');

function ajaxResponse(){
	global $wpdb; 	global $userdata;
	$terms = get_terms("ngg_tag");
 	
 	$match = array();
 	
 	foreach ( $terms as $term ) {
       $match[] = $term->name;
        
     }
	echo json_encode($match);

exit;
}

add_action('wp_ajax_my_action', 'ajaxResponse');

?>