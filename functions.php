<?php


/////////////////////////////////
// SET THUMBNAIL SIZES
/////////////////////////////////

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 75, 75 );
}

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	add_image_size( 'homepage-thumb', 220, 180, true ); //(cropped)
}


/////////////////////////////////
// CUSTOM 'READ MORE...' LINK
/////////////////////////////////

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '&nbsp;<a class="excerpt-more" href="'. get_permalink($post->ID) . '">More...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/////////////////////////////////
// REGISTER FRONT-PAGE WIDGET AREA FOR ANNOUNCEMENTS
/////////////////////////////////

// See the __() WordPress function for valid values for $text_domain.
register_sidebar( array(
    'id'          => 'front-page',
    'name'        => 'Front Page',
    'description' => 'This Widget area provides an area for site-wide announcements on the front page.',
    'before_widget' => '<div id="%1$s" class="directory-card widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="directory-card-title">',
    'after_title' => '</h2>'
) );


/////////////////////////////////
// ENABLE YARPP PLUGIN FOR TYPES CPT
/////////////////////////////////
// http://wordpress.org/support/topic/yarpp-and-custom-post-type-with-typesviews

add_filter('wpcf_type', 'yarpp_support_func', 10, 2);
function yarpp_support_func($data, $post_type)
{
    if(in_array($post_type, array(
        'article',
        )))
    {
        $data['yarpp_support'] = true;
    }
    return $data;
}


/////////////////////////////////
// DISPLAY CUSTOM POST TYPES FOR AUTHORS
/////////////////////////////////
// http://css-tricks.com/snippets/wordpress/make-archives-php-include-custom-post-types/

function namespace_add_custom_types( $query ) {
  if( is_author() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'article', 'commission'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );



/////////////////////////////////
// DISPLAY CUSTOM POST TYPES FOR CATEGORIES AND TAGS
/////////////////////////////////
// http://css-tricks.com/snippets/wordpress/make-archives-php-include-custom-post-types/

function archives_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'article', 'commission', 'experiment'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'archives_add_custom_types' );




/////////////////////////////////
// FIX POST IMAGE AND CAPTION INLINE STYLES
/////////////////////////////////
// http://troychaplin.ca/2012/fix-automatically-generated-inline-style-on-wordpress-image-captions/



add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
function fixed_img_caption_shortcode($attr, $content = null) {
    if ( ! isset( $attr['caption'] ) ) {
        if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
            $content = $matches[1];
            $attr['caption'] = trim( $matches[2] );
        }
    }
    $output = apply_filters('img_caption_shortcode', '', $attr, $content);
    if ( $output != '' )
        return $output;
    extract(shortcode_atts(array(
        'id'    => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => ''
    ), $attr));
    if ( 1 > (int) $width || empty($caption) )
        return $content;
    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '">'
    . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}


// http://wordpress.stackexchange.com/questions/5568/filter-to-remove-image-dimension-attributes
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


/////////////////////////////////
// OVERRIDE DEFAULT WORDPRESS GALLERY STYLE
/////////////////////////////////
// http://logoscreative.co/taking-control-of-wordpress-gallery-styling-without-a-plugin/

// Remove Gallery Styling
add_filter( 'gallery_style', 'my_gallery_style', 99 );

function my_gallery_style() {
    return "
";
}

add_filter( 'use_default_gallery_style', '__return_false' );



/////////////////////////////////
// LIST AUTHORS OF CUSTOM POST TYPES
/////////////////////////////////
// http://wordpress.stackexchange.com/questions/90600/wp-list-authors-including-custom-post-types

function custom_wp_list_authors($args = '') {
global $wpdb;

$defaults = array(
    'orderby' => 'name', 'order' => 'ASC', 'number' => '',
    'optioncount' => false, 'exclude_admin' => true,
    'show_fullname' => false, 'hide_empty' => true,
    'feed' => '', 'feed_image' => '', 'feed_type' => '', 'echo' => true,
    'style' => 'list', 'html' => true
);

$args = wp_parse_args( $args, $defaults );
extract( $args, EXTR_SKIP );

$return = '';

$query_args = wp_array_slice_assoc( $args, array( 'orderby', 'order', 'number' ) );
$query_args['fields'] = 'ids';
$authors = get_users( $query_args );

    $custom_post_types = get_post_types(array('_builtin' => false));
    if(!empty($custom_post_types)){
        $temp = implode ("','", $custom_post_types);
        $custom_post_types = "'"; 
        $custom_post_types .= $temp; 
        $custom_post_types .= "','post'";
    }else{
        $custom_post_types .= "'post'";
    }
$author_count = array();        
foreach ( (array) $wpdb->get_results("SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE post_type in ($custom_post_types)  AND " . get_private_posts_cap_sql( 'post' ) . " GROUP BY post_author") as $row )
    $author_count[$row->post_author] = $row->count;

foreach ( $authors as $author_id ) {
    $author = get_userdata( $author_id );

    if ( $exclude_admin && 'admin' == $author->display_name )
        continue;

    $posts = isset( $author_count[$author->ID] ) ? $author_count[$author->ID] : 0;

    if ( !$posts && $hide_empty )
        continue;

    $link = '';

    if ( $show_fullname && $author->first_name && $author->last_name )
        $name = "$author->first_name $author->last_name";
    else
        $name = $author->display_name;

    if ( !$html ) {
        $return .= $name . ', ';

        continue; // No need to go further to process HTML.
    }

    if ( 'list' == $style ) {
        $return .= '<li>';
    }

    $link = '<a href="' . get_author_posts_url( $author->ID, $author->user_nicename ) . '" title="' . esc_attr( sprintf(__("Posts by %s"), $author->display_name) ) . '">' . $name . '</a>';

    if ( !empty( $feed_image ) || !empty( $feed ) ) {
        $link .= ' ';
        if ( empty( $feed_image ) ) {
            $link .= '(';
        }

        $link .= '<a href="' . get_author_feed_link( $author->ID ) . '"';

        $alt = $title = '';
        if ( !empty( $feed ) ) {
            $title = ' title="' . esc_attr( $feed ) . '"';
            $alt = ' alt="' . esc_attr( $feed ) . '"';
            $name = $feed;
            $link .= $title;
        }

        $link .= '>';

        if ( !empty( $feed_image ) )
            $link .= '<img src="' . esc_url( $feed_image ) . '" style="border: none;"' . $alt . $title . ' />';
        else
            $link .= $name;

        $link .= '</a>';

        if ( empty( $feed_image ) )
            $link .= ')';
    }

    if ( $optioncount )
        $link .= ' ('. $posts . ')';

    $return .= $link;
    $return .= ( 'list' == $style ) ? '</li>' : ', ';
}

$return = rtrim($return, ', ');

if ( !$echo )
    return $return;

echo $return;
}



/////////////////////////////////
// ADD CUSTOM TAXONOMY TERMS TO POST_CLASS()
/////////////////////////////////
//http://wordpress.stackexchange.com/questions/2266/add-post-classes-for-custom-taxonomies-to-custom-post-type

add_filter( 'post_class', 'wpse_2266_custom_taxonomy_post_class', 10, 3 );

if ( ! function_exists('wpse_2266_custom_taxonomy_post_class') ) {
    function wpse_2266_custom_taxonomy_post_class($classes, $class, $ID) {

        $taxonomies_args = array(
            'public' => true,
            '_builtin' => false,
        );

        $taxonomies = get_taxonomies( $taxonomies_args, 'names', 'and' );

        $terms = get_the_terms( (int) $ID, (array) $taxonomies );

        if ( ! empty( $terms ) ) {
            foreach ( (array) $terms as $order => $term ) {
                if ( ! in_array( $term->slug, $classes ) ) {
                    $classes[] = $term->slug;
                }
            }
        }

        $classes[] = 'clearfix';

        return $classes;
    }
}



/////////////////////////////////
// ENABLE STICKY POSTS ON ARCHIVE LOOPS
/////////////////////////////////
//http://www.wpbeginner.com/wp-tutorials/how-to-add-sticky-posts-in-custom-post-type-archives/


function wpb_cpt_sticky_at_top( $posts ) {
 
    // apply it on the archives only
    // GFS - I've altered this by removing the requirement that it be only on post_type_archive. This is so the sticky post will work on the experiment custom loop. To restore, restore commented-out section in the line below
    if ( is_main_query() && is_page( 462 ) /* && is_post_type_archive() */ ) {
        global $wp_query;
 
        $sticky_posts = get_option( 'sticky_posts' );
        $num_posts = count( $posts );
        $sticky_offset = 0;
 
        // Find the sticky posts
        for ($i = 0; $i < $num_posts; $i++) {
 
            // Put sticky posts at the top of the posts array
            if ( in_array( $posts[$i]->ID, $sticky_posts ) ) {
                $sticky_post = $posts[$i];
 
                // Remove sticky from current position
                array_splice( $posts, $i, 1 );
 
                // Move to front, after other stickies
                array_splice( $posts, $sticky_offset, 0, array($sticky_post) );
                $sticky_offset++;
 
                // Remove post from sticky posts array
                $offset = array_search($sticky_post->ID, $sticky_posts);
                unset( $sticky_posts[$offset] );
            }
        }
 
        // Look for more sticky posts if needed
        if ( !empty( $sticky_posts) ) {
 
            $stickies = get_posts( array(
                'post__in' => $sticky_posts,
                'post_type' => $wp_query->query_vars['post_type'],
                'post_status' => 'publish',
                'nopaging' => true
            ) );
 
            foreach ( $stickies as $sticky_post ) {
                array_splice( $posts, $sticky_offset, 0, array( $sticky_post ) );
                $sticky_offset++;
            }
        }
 
    }
 
    return $posts;
}
 
add_filter( 'the_posts', 'wpb_cpt_sticky_at_top' );

// Add sticky class in article title to style sticky posts differently

function cpt_sticky_class($classes) {
			if ( is_sticky() ) : 
			$classes[] = 'sticky';
	        return $classes;
		endif; 
		return $classes;
				}
	add_filter('post_class', 'cpt_sticky_class');


// Register the primary navigation menu
function primary_menu() {
  register_nav_menu('primary-menu',__( 'Primary Menu' ));
}
add_action( 'init', 'primary_menu' );




?>