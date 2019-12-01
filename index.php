
<?php get_header(); ?>

<h1>Hello world!</h1>

<?php
while (have_posts()) {
    the_post();
?>
    <div class="title">
        <h2>Title</h2>
        <?php the_title(); ?>
    </div>
    <div class="content">
        <h3>Content</h3>
        <?php the_content(); ?>
    </div>
<?php
}
?>

<?php get_footer();
