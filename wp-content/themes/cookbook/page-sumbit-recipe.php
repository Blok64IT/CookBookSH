<?php /* Template Name: Question Form */ get_header();

if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "add_new") {

// Do some minor form validation to make sure there is content
if (isset ($_POST['name'])) {
        $title =  $_POST['name'];
} else {
        echo 'Please enter a  title';
}
if (isset ($_POST['description'])) {
        $description = $_POST['description'];
} else {
        echo 'Please enter the content';
}
$tags = $_POST['post_tags'];

// Add the content of the form to $post as an array
$new_post = array(
        'post_title'    => $title,
        'post_content'  => $description,
        'post_category' => array($_POST['recipes']),  // Usable for custom taxonomies too
        'tags_input'    => array($tags),
        'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
        'post_type' => 'recipes'  //'post',page' or use a custom post type if you want to
);
//save the new post
$pid = wp_insert_post($new_post);
wp_redirect(get_permalink($pid)); exit;
//insert taxonomies
} ?>

<div id="wrap">
        <div id="header">
        <?php get_template_part('logo');
        get_template_part('nav'); ?>
    </div>
    <div class="container"id="content">
        <div id="main">
            <?php get_template_part('searches'); ?>
            <div class="single-post-item">
                <h1>Write Recipe</h1>
                <div class="post-meta">Fill out the fields below, all of them are required!</div>
                <div class="inner-content">
                        <!-- New Post Form -->
                    <div id="postbox">
                        <form id="new_post" name="new_post" method="post" action="">
                            <!-- post name -->
                            <p><label for="title">Title</label><br />
                            <input type="text" id="title" value="" tabindex="1" size="20" name="title" />
                            </p>

                            <!-- post Category -->
                            <p><label for="Category">Category:</label><br />
                            <p><?php wp_dropdown_categories( 'tab_index=3&taxonomy=category' ); ?></p>


                            <!-- post Content -->
                            <p><label for="description">Content</label><br />
                            <textarea id="description" tabindex="4" name="description" cols="50" rows="6"></textarea>
                            </p>

                            <!-- post tags -->
                            <p><label for="post_tags">Tags:</label>
                            <input type="text" value="" tabindex="5" size="16" name="post_tags" id="post_tags" /></p>
                            <p align="right"><input type="submit" value="Publish" tabindex="6" id="submit" name="submit" /></p>

                            <input type="hidden" name="action" value="new_post" />
                            <?php wp_nonce_field( 'new-post' ); ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
