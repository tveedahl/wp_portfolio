<?php get_header(); ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner_2_v4.jpg" />
                <div class="container">
                    <div class="carousel-caption first">
                        <h2>Frontend/Backend Development</h2>
                        <p>
                            My background includes having worked with a variety of frontend/backend content management systems, frameworks, and programming languages. I am also able to learn new technical skills quickly.
                        </p>
                        <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>-->
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="second-slide" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner_3_v3.jpg" />
                <div class="container">
                    <div class="carousel-caption second">
                        <h2>Responsive Design/Mobile Apps</h2>
                        <p>
                            I know the importance of having a mobile presence in the world today. I can work with you to determine what type of solution works best, whether it is one that is native, hybrid, or responsive.
                        </p>
                        <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="third-slide" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner_1_v8.jpg" />
                <div class="container">
                    <div class="carousel-caption third">
                        <h2>Dashboards/Analytics</h2>
                        <p>
                            I think data is important and impacts almost everything in our lives. In the past, I have developed a variety of custom data-driven dashboards and can work with you to do this as well. My education and experience also makes me capable of helping you with your analytics needs.
                        </p>
                        <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>-->
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if ( is_home() && ! is_front_page() ) : ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>
            <?php get_template_part('template-parts/content-portfolio', get_post_format()); ?>
        </main>
    </div>
<?php get_footer(); ?>
