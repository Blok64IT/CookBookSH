<?php get_header(); ?>

<div class="container px-lg-5">
<h1> <?php the_title(); ?></h1> 


<div class="row mx-lg-n5">
  <div class="col-sm-9">
  </div>
  <div>
    <?php  if (have_posts()) : while (have_posts()) :  the_post();?>

       <?php the_content(); ?>

    <?php   endwhile; endif; ?>
  </div>


</div>
</div>
<?php get_footer(); ?>
