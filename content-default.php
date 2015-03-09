<?php
  $post = get_post();
  $post_id = $post->ID;
  $post_title = $post->post_title;
?>

<?php
  if ( has_post_thumbnail() ) {
?>

  <div class="page_image">

    <?php
        the_post_thumbnail( 'large' );
    ?>

  </div>

<?php
  }
?>

<h1 class="page_headline">
  <?php echo $post_title; ?>
</h1>

<div class="page_authors">
  <?php echo render_author_list( $post ); ?>
</div>

<div class="richtext richtext--full-content">
  <?php
    echo apply_filters( 'the_content', $post->post_content );
  ?>
</div>