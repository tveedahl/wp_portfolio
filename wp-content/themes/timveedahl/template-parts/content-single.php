<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package timveedahl
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="row singleTitle">
            <div class="col-lg-6 col-lg-offset-2">
				 <?php the_title('<h2>', '</h2>'); ?>
            </div>
        </div>
        <div class="row">
            <div class="entry-meta col-lg-8 col-lg-offset-2">
                <?php timveedahl_posted_on(); ?>
            </div>
        </div>
    </header>
    <div class="entry-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'timveedahl'),
                        'after'  => '</div>',
                    ));
                ?>
            </div>
        </div>
    </div>
    <footer class="entry-footer">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <?php timveedahl_entry_footer(); ?>
            </div>
        </div>
    </footer>
</article>
