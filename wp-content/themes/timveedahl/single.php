<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package timveedahl
*/
?>

<?php get_header(); ?>
<?php echo '<div class="container">'; ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', 'single' ); ?>
        <?php the_post_navigation(); ?>
        <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) : comments_template();
            endif;
        ?>
    <?php endwhile; ?>
<?php echo '</div>'; ?>
<?php get_footer(); ?>
