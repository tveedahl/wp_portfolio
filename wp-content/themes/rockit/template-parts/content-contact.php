<?php
/**
 * Contact Form 7 Plugin Contact Form
 *
 * Add Contact Form 7 shortcode to Contact page in Admin to display form
 */
?>

<?php
    $contact_page = new WP_Query('pagename=Contact');
    $contact_page->the_post();
?>

<div class="row contactTitle">
    <div class="col-lg-2 col-lg-offset-5 text-center">
        <h1><?php the_title(); ?></h1>
    </div>
</div>
<div class="row contactContent">
    <div class="col-md-offset-4">
        <?php the_content(); ?>
    </div>
</div>
