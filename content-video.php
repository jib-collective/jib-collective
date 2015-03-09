<?php
  $post = get_post();
  $post_id = $post->ID;
  $post_title = $post->post_title;

  $video_url = get_field( 'video-url', $post_id );
  $video_embed_code = wp_oembed_get( $video_url, array( 'width' => '960px' ) );
?>

<div class="page_video">
  <?php
    echo $video_embed_code;
  ?>
</div>

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