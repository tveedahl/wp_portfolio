<?php
    /* Template name: timVeedahl */
    get_header();
?>
<?php if ( is_home() && ! is_front_page() ) : ?>
    <header>
        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    </header>
<?php endif; ?>
<div style="margin: 30px 0 0 0;" class="row">
    <h1 class="col-lg-12 text-center">What I Do</h1>
</div>
<div class="row">
    <div class="col-lg-4 text-center">
        <img class="img-circle" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/front_back_circ_v1.jpg" />
        <h2>Full Stack Development</h2>
        <p>
            My background includes having worked with a variety of frontend/backend content management systems, frameworks, and programming languages. I am also able to learn new technical skills quickly.
        </p>
    </div>
    <div class="col-lg-4 text-center">
        <img class="img-circle" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/mobile_circ_v1.jpg" />
        <h2>Mobile Applications</h2>
        <p>
            I know the importance of having a mobile presence in the world today. I can work with you to determine what type of solution works best, whether it is one that is native, hybrid, or responsive.
        </p>
    </div>
    <div class="col-lg-4 text-center">
        <img class="img-circle" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/dash_analytics_circ_v1.jpg" />
        <h2>Dashboards/Analytics</h2>
        <p>
            I think data is important and impacts almost everything in our lives. In the past, I have developed a variety of custom data-driven dashboards and can work with you to do this as well. My education and experience also makes me capable of helping you with your analytics needs.
        </p>
    </div>
</div>
<hr class="featurette-divider">
<div class="row">
    <h1 class="col-lg-12 text-center">Who I Am</h1>
</div>
<div class="row featurette">
    <div class="col-md-7 pull-right">
        <h2 class="featurette-heading">What I Follow. <span class="text-muted">Industry trends I find important.</span></h2>
        <p class="lead">
            Twitter is my source for keeping current. I find this integral to being an effective developer.
        </p>
    </div>
    <div class="col-md-5">
        <?php
            $post_id = 71;
            $queried_post = get_post($post_id);
            $title = $queried_post->post_title;
            echo $title;
            echo $queried_post->post_content;
        ?>
    </div>
</div>
<hr class="featurette-divider">
<div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">What I Build. <span class="text-muted">See what I tinker with on Github.</span></h2>
        <p class="lead">
            You can checkout the source code for all my public code repositories in Github. Another way I learn new skills is by building things using a variety of technologies.
        </p>
    </div>
    <div class="github-card" data-github="tveedahl" data-width="400" data-height="152" data-theme="default"></div>
    <script src="//cdn.jsdelivr.net/github-cards/latest/widget.js"></script>
</div>
<hr class="featurette-divider">
<div class="row featurette">
    <div class="col-md-7 col-md-push-5">
        <h2 class="featurette-heading">Connect With Me. <span class="text-muted">Join my LinkedIn Network.</span></h2>
        <p class="lead">
            I maintain an active LinkedIn profile. Check it out to get a better sense of my work history and skill set.
        </p>
    </div>
    <div class="col-md-5 col-md-pull-7">
        <script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
        <div class="LI-profile-badge"  data-version="v1" data-size="medium" data-locale="en_US" data-type="vertical" data-theme="light" data-vanity="timveedahl"><a class="LI-simple-link" href='https://www.linkedin.com/in/timveedahl?trk=profile-badge'>Tim Veedahl</a></div>    </div>
</div>
<?php get_footer(); ?>
