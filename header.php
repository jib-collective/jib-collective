<?php
  $page_title = wp_title( '', false );
  $page_description = get_bloginfo( 'description' );
  $css_directory = get_bloginfo( 'template_directory' );

  if( !$page_title ) {
    $page_title = 'jib-collective';
  } else {
    $page_title .= " | jib-collective";
  }

  if(  is_single() || is_page() ) {
    $post = get_post();
    $page_description = get_field( 'excerpt', $post->ID );
  }
?>

<!doctype html />

<html>
  <head>
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet"
          href="<?php bloginfo('stylesheet_url'); ?>" />
    <meta charset="utf-8" />

    <?php
      if( $page_description ) {
    ?>

      <meta name="description"
            content="<?php echo wp_strip_all_tags( $page_description ); ?>" />

    <?php
      }
    ?>

  </head>

<?php
  $background = '';

  if( is_page() ) {
    $page_id = $post->ID;
    $background_image_url = get_field( 'background-image', $page_id );



    if( $background_image_url ) {
      $background = $background_image_url;
    }
  }
?>

<body
  <?php
  if( $background ) {
    echo 'style="background-image: url(' . $background . ')";';
  }
  ?>
>

<div class="page">
  <header class="header">
    <div class="header_logo">
      <?php if( !is_home() ) { ?>
        <a href="/">
      <?php } ?>

        <img class="header_logo-image"
             src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" />

      <?php if( !is_home() ) { ?>
        </a>
      <?php } ?>
    </div>

    <?php wp_nav_menu(array( "theme_location" => "header-menu",
                             "container" => '',
                             "menu_class" => 'header_menu' )); ?>


    <div class="header_menu-social">
      &copy; <?php echo date("Y"); ?>
      <?php wp_nav_menu(array( "theme_location" => "header-social",
                               "container" => "", )); ?>
    </div>

  </header>



  <div class="main">