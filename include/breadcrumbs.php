<?php if( ! defined( 'ABSPATH' ) ) { exit; }

// Breadcrumbs
add_action('breadcrumbs','new_photography_custom_breadcrumbs');
function new_photography_custom_breadcrumbs() {
       
    // Do not display on the homepage
       
	?> <div class="breadcrumb"> <!-- breadcrumb --> <?php

	/* === OPTIONS === */
	$texthome     = "<span class='dashicons dashicons-admin-home'></span>"; // text for the 'Home' link
	$text_category = esc_html('Archive by Category "%s"','new-photography'); // text for a category page
	$text_search   = esc_html('Search Results for "%s" Query','new-photography'); // text for a search results page
	$text_tag      = esc_html('Posts Tagged "%s"','new-photography'); // text for a tag page
	$text_author  = esc_html('Articles Posted by %s','new-photography'); // text for an author page
	$text_404      = esc_html('Error 404','new-photography'); // text for the 404 page
	$show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
	$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_title     = 1; // 1 - show the title for the links, 0 - don't show
	$delimiter      = ' &raquo; '; // delimiter between crumbs
	$before         = wp_kses_post('<span class="current">'); // tag before the current crumb
	$after          = wp_kses_post('</span>'); // tag after the current crumb
	/* === END OF OPTIONS === */
	global $post;
	$home_link    = home_url('/');
	$link_before  = wp_kses_post('<span>');
	$link_after   = wp_kses_post('</span>');
	$link_attr    = esc_html(' rel="v:url" property="v:title"');
	$link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	$parent_id    = $parent_id_2 = $post->post_parent;
	$frontpage_id = get_option('page_on_front');
	
		echo '<ul>';
		echo '<li class="breadcrumbs">';
		if ($show_home_link == 1) {
			echo '<a href="' . esc_url($home_link) . '" rel="v:url" property="v:title">' . wp_kses_post($texthome) . '</a>';
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo esc_html($delimiter);
		}
		if ( is_category() ) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, esc_html($delimiter));
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo esc_html($cats);
			}
			if ($show_current == 1) echo wp_kses_post($before) . sprintf($text_category, single_cat_title('', false)) . wp_kses_post($after);
		} elseif ( is_search() ) {
			echo wp_kses_post($before) . sprintf($text_search, get_search_query()) . wp_kses_post($after);
		} elseif ( is_day() ) {
			echo sprintf($link, esc_html(get_year_link(get_the_time('Y'))), esc_html(get_the_time('Y'))) . esc_html($delimiter);
			echo sprintf($link, esc_html(get_month_link(get_the_time('Y')),esc_html(get_the_time('m'))), esc_html(get_the_time('F'))) . esc_html($delimiter);
			echo wp_kses_post($before) . esc_html(get_the_time('d')) . wp_kses_post($after);
		} elseif ( is_month() ) {
			echo sprintf($link, esc_html(get_year_link(get_the_time('Y'))), esc_html(get_the_time('Y'))) . esc_html($delimiter);
			echo wp_kses_post($before) . esc_html(get_the_time('F')) . wp_kses_post($after);
		} elseif ( is_year() ) {
			echo wp_kses_post($before) . esc_html(get_the_time('Y')) . wp_kses_post($after);
		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf(wp_kses_post($link), wp_kses_post($home_link) . '/' . wp_kses_post($slug['slug']) . '/', esc_html($post_type->labels->singular_name));
				if ($show_current == 1) echo esc_html($delimiter) . wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, esc_html($delimiter));
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo wp_kses_post($cats);
				if ($show_current == 1) echo wp_kses_post($before) . esc_html(get_the_title() ). wp_kses_post($after);
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo wp_kses_post($before) . esc_html($post_type->labels->singular_name) . wp_kses_post($after);
		} elseif ( is_attachment() ) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			if ($cat) {
				$cats = get_category_parents($cat, TRUE, esc_html($delimiter));
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo wp_kses_post($cats);
			}
			printf(esc_url($link), esc_url(get_permalink($parent)), esc_html($parent->post_title));
			if ($show_current == 1) echo esc_html($delimiter) . wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1) echo wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
		} elseif ( is_page() && $parent_id ) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = [];
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, esc_url(get_permalink($page->ID)), esc_html(get_the_title($page->ID)));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo wp_kses_post($breadcrumbs[$i]);
					if ($i != count($breadcrumbs)-1) echo esc_html($delimiter);
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo esc_html($delimiter);
				echo wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
			}
		} elseif ( is_tag() ) {
			echo wp_kses_post($before) . sprintf($text_tag, esc_html(single_tag_title('', false))) . wp_kses_post($after);
		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo wp_kses_post($before) . sprintf($text_author, esc_html($userdata->display_name)) . wp_kses_post($after);
		} elseif ( is_404() ) {
			echo wp_kses_post($before) . esc_html($text_404 ). wp_kses_post($after);
		} elseif ( has_post_format() && !is_singular() ) {
			echo esc_html(get_post_format_string( get_post_format() ));
		}
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo esc_html__('Page', 'new-photography') . ' ' . wp_kses_post(get_query_var('paged'));
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
		echo '</li><!-- .breadcrumbs -->';
		echo '</ul>';
	
    ?> </div> <!-- end breadcrumb --> <?php      
    
}



add_action( 'customize_register', 'new_photography_customize_register' );
function new_photography_customize_register( $wp_customize ) {
	
	$wp_customize->add_section( 'new_photography_breadcrumb' , array(
		'title'    => __( 'Breadcrumb', 'new-photography' ),
		'priority' => 7,
	) );	

	$wp_customize->add_setting( 'new_photography_home_activate_breadcrumb', array (
            'default' => '',		
			'sanitize_callback' => 'new_photography__sanitize_checkbox',
		) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_home_activate_breadcrumb', array(
		'label'    => __( 'Activate Breadcrumb', 'new-photography' ),
		'section'  => 'new_photography_breadcrumb',
		'priority'    => 3,				
		'settings' => 'new_photography_home_activate_breadcrumb',
		'type' => 'checkbox',
	) ) );
	
	$wp_customize->add_setting( 'new_photography_home_page_breadcrumb', array (
            'default' => '',		
			'sanitize_callback' => 'new_photography__sanitize_checkbox',
		) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_photography_home_page_breadcrumb', array(
		'label'    => __( 'Activate Home Page Breadcrumb', 'new-photography' ),
		'section'  => 'new_photography_breadcrumb',
		'priority'    => 3,				
		'settings' => 'new_photography_home_page_breadcrumb',
		'type' => 'checkbox',
	) ) );	
}