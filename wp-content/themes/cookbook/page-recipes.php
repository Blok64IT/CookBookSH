
<?php get_header(); ?>
<div class="container">


<h1><?php the_title(); ?></h1>
<?php
$post_args = array( 'post_type' => 'recipes', 'posts_per_page' => 8 );
$post_query = new WP_Query( $post_args );

if ( $post_query->have_posts() ) :
while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

<h2><?php the_title(); ?></h2>
<?php the_excerpt();?>
<a href="<?php the_permalink();?>" class="btn btn-info">Read More<a/>
<div class="posts-entry">
<?php the_content(); ?>

</div>
<?php wp_reset_postdata(); ?>

<?php endwhile; // ending while loop ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no recipes matched your criteria.' ); ?></p>
<?php endif; // ending condition ?>
</div>
<?php get_footer(); ?>
