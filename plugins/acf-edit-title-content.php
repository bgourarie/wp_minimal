<?php
/*
Plugin Name: Advanced Custom Fields: Edit Title & Content
Plugin URI: http://bitbucket.org/jupitercow/acf-edit-title-content
Description: Allows an Advanced Custom Fields form to edit post_title and post_content in front-end forms.
Version: 0.1
Author: Jake Snyder
Author URI: http://Jupitercow.com/
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

------------------------------------------------------------------------
Copyright 2013 Jupitercow, Inc.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

if (! class_exists('acf_edit_title_content') ) :

add_action( 'init', array('acf_edit_title_content', 'init') );

class acf_edit_title_content
{
	/**
	 * Class prefix
	 *
	 * @since 0.1
	 * @var string
	 */
	public static $prefix = 'edit_title_content';

	/**
	 * Current version of plugin
	 *
	 * @since 0.1
	 * @var string
	 */
	public static $version = '0.1';

	/**
	 * The default settings
	 *
	 * @since 0.1
	 * @var string
	 */
	public static $settings = array();

	/**
	 * Initialize the Class
	 *
	 * @author  Jake Snyder
	 * @since	0.1
	 * @return	void
	 */
	public static function init()
	{
		if (! self::test_requirements() ) return;

		// Create the new object
		add_filter( 'acf/pre_save_post', array(__CLASS__, 'process_title_content'), 10 );
		// Add a basic title/content interface for default use
		add_action( 'wp',                array(__CLASS__, 'register_field_groups') );
		// Load the content fields
		add_action( 'wp',                array(__CLASS__, 'load_fields') );
	}

	/**
	 * Make sure that any neccessary dependancies exist
	 *
	 * @author  Jake Snyder
	 * @since	0.1
	 * @return	bool True if everything exists
	 */
	public static function test_requirements()
	{
		// Look for ACF
		if (! class_exists('Acf') ) return false;
		return true;
	}

	public static function load_fields()
	{
		// Load post title
		add_filter( 'acf/load_value/name=' . apply_filters( 'acf/' . self::$prefix . '/title/name', 'form_post_title' ),   array(__CLASS__, 'load_value_post_title'), 10, 3 );
		// Load post content
		add_filter( 'acf/load_value/name=' . apply_filters( 'acf/' . self::$prefix . '/content/name', 'form_post_content' ), array(__CLASS__, 'load_value_post_content'), 10, 3 );
	}

	/**
	 * Load existing post_title
	 *
	 * @author  Jake Snyder
	 * @since	0.1
	 * @return	string $value
	 */
	public static function load_value_post_title( $value, $post_id, $field )
	{
		if (! $post_id || ! is_numeric($post_id) ) return;

		$value = get_the_title($post_id);
		return $value;
	}

	/**
	 * Load existing post_content
	 *
	 * @author  Jake Snyder
	 * @since	0.1
	 * @return	string $value
	 */
	public static function load_value_post_content( $value, $post_id, $field )
	{
		$post = get_post($post_id);
		if ( is_object($post) ) $value = $post->post_content;

		return $value;
	}

	/**
	 * Make sure the post_title and post_content get saved correctly and not into meta
	 *
	 * @author  Jake Snyder
	 * @since	0.1
	 * @return	int post id
	 */
	public static function process_title_content( $post_id )
	{
		// Don't run if adding/updated fields/field-groups in wp-admin

		if (! is_admin() && 'acf' != get_post_type( $post_id ) && ! empty($_POST['acf']) )
		{
			$post_data = array(
				'ID' => $post_id,
			);

			$update = false;
			foreach ( $_POST['acf'] as $field_key => $field_value )
			{
				$field = get_field_object($field_key, $post_id);

				if ( apply_filters( 'acf/' . self::$prefix . '/title/name', 'form_post_title' ) == $field['name'] )
				{
					$post_data['post_title'] = $field_value;
					// Keep it out of meta data
					unset($_POST['acf'][$field_key]);
					$update = true;
				}
				elseif ( apply_filters( 'acf/' . self::$prefix . '/content/name', 'form_post_content' ) == $field['name'] )
				{
					$post_data['post_content'] = $field_value;
					// Keep it out of meta data
					unset($_POST['acf'][$field_key]);
					$update = true;
				}
			}

			// Save ACF field as post_content / post_title for front-end posting
			if ( $update ) wp_update_post( $post_data );
		}

		return $post_id;
	}

	/**
	 * Add a basic interface for adding to front end forms, so we don't have to create them in the admin
	 *
	 * @author  Jake Snyder
	 * @since	0.1
	 * @return	void
	 */
	public static function register_field_groups()
	{
		if ( function_exists("register_field_group") )
		{
			$args = array(
				'id' => 'acf_post-title-content',
				'title' => apply_filters( 'acf/' . self::$prefix . '/group/title', 'Post Title and Content' ),
				'fields' => array (),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => '',
							'order_no' => 0,
							'group_no' => 0,
						),
					),
				),
				'options' => array (
					'position' => 'normal',
					'layout' => 'no_box',
					'hide_on_screen' => array (
					),
				),
				'menu_order' => -10,
			);

			if ( apply_filters( 'acf/' . self::$prefix . '/title/add', true ) )
			{
				$args['fields'][] = array (
					'key' => 'field_5232d86ba9246title',
					'label' => apply_filters( 'acf/' . self::$prefix . '/title/title', 'Title' ),
					'name' => apply_filters( 'acf/' . self::$prefix . '/title/name', 'form_post_title' ),
					'type' => apply_filters( 'acf/' . self::$prefix . '/title/type', 'text' ),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				);
			}

			if ( apply_filters( 'acf/' . self::$prefix . '/content/add', true ) )
			{
				$args['fields'][] = array (
					'key' => 'field_5232d8daa9247content',
					'label' => apply_filters( 'acf/' . self::$prefix . '/content/title', 'Content' ),
					'name' => apply_filters( 'acf/' . self::$prefix . '/content/name', 'form_post_content' ),
					'type' => apply_filters( 'acf/' . self::$prefix . '/content/type', 'wysiwyg' ),
					'default_value' => '',
					'toolbar' => apply_filters( 'acf/' . self::$prefix . '/content/toolbar', 'basic' ),
					'media_upload' => apply_filters( 'acf/' . self::$prefix . '/content/media_upload', 'no' ),
				);
			}

			register_field_group( $args );
		}
	}
}

endif;
