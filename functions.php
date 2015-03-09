<?php
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

  add_image_size( 'featured-category-image', 700 );
  add_image_size( 'gallery-image', 1024, 690 );
  add_image_size( 'category-image', 350 );
  add_image_size( 'custom-size', 220, 180 );
  add_image_size( 'author-portrait', 200, 200 );
  set_post_thumbnail_size( 150, 150 );

  function register_my_menu() {
    register_nav_menu( 'header-menu', __( 'Header Menu' ) );
    register_nav_menu( 'header-social', __( 'Social Menu' ) );
  }

  function exclude_pages_from_admin( $query ) {
    if ( !is_admin() ) {
      return $query;
    }

    global $pagenow, $post_type;

    if ( $pagenow == 'edit.php' && $post_type == 'page' )
      $query-> query_vars[ 'post__not_in' ] = array( 49, 43 );
  }

  function render_author_list( $post ) {
    $buffer = '<span>by&nbsp;</span><ul>';
    $coauthors = get_coauthors( $post->ID );
    $counter = 0;

    foreach( $coauthors as $coauthor ) {
      $coauthor_id = $coauthor->ID;
      $name = $coauthor->display_name;
      $coauthor_link = get_author_posts_url( $coauthor_id );
      $comma = ',&nbsp;';
      $link = '<a href="' . $coauthor_link . '">' .
                $name .
              '</a>';


      if( $counter == 0 ) {
        $comma = '';
      }

      if( $coauthor->type == 'guest-author' ) {
        $link = '<span>' . $name . '</span>';
      }

      $buffer .= '<li>' . $comma . $link . '</li>';
      $counter += 1;
    }

    $buffer .= '</ul>';
    return $buffer;
  }

  add_action( 'init', 'register_my_menu' );
  add_filter( 'parse_query', 'exclude_pages_from_admin' );
?>