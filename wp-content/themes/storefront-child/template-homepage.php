<?php
    /*Template name: Asswipe*/
    get_header(); 
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/banner_1_v8.jpg" />
            <div class="container">
                <div class="carousel-caption first">
                    <h1>“Numbers have an important story to tell. They rely on you to give them a clear and convincing voice.”</h1>
					<p>
					    — Stephen Few
					</p>
                    <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>-->
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/banner_2_v4.jpg" />
            <div class="container">
                <div class="carousel-caption second">
                    <h1>"Most good programmers do programming not because they expect to get paid or get adulation by the public, but because it is fun to program."</h1>
                    <p>
                        — Linus Torvalds
                    </p>
                    <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/banner_3_v4.jpg" />
            <div class="container">
                <div class="carousel-caption third">
                    <h1>"If your plans don’t include mobile, your plans are not finished."</h1>
                    <p>
                        — Wendy Clark, Coca-Cola
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
<?php if ( is_home() && ! is_front_page() ) : ?>
    <header>
        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    </header>
<?php endif; ?>
<div class="row">
    <h1 class="col-lg-12 text-center">What I Do</h1>
</div>
<div class="row">
    <div class="col-lg-4 text-center">
        <img class="img-circle" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/dash_analytics_circ_v1.jpg" />
        <h2>Dashboards/Analytics</h2>
        <p>
            I think data is important and impacts almost everything in our lives. In the past, I have developed a variety of custom data-driven dashboards and can work with you to do this as well. My education and experience also makes me capable of helping you with your analytics needs.
        </p>
    </div>
    <div class="col-lg-4 text-center">
        <img class="img-circle" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/front_back_circ_v1.jpg" />
        <h2>Frontend/Backend Development</h2>
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
</div>
<hr class="featurette-divider">
<div class="row">
    <h1 class="col-lg-12 text-center">Who I Am</h1>
</div>
<div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">What I Follow. <span class="text-muted">Industry trends I find important.</span></h2>
        <p class="lead">
            Twitter is my source for keeping current. I find this integral to being an effective developer.
        </p>
    </div>
    <div class="col-md-5">
        <a class="twitter-timeline" data-widget-id="673883622609317888" href="https://twitter.com/t_veedahl" data-chrome="nofooter">Tweets by @t_veedahl</a>
        <script>
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
        </script>
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
    <div class="col-md-5">
        <?php
            $user = 'tveedahl';
            $token = 'bd4d707603a146be768e4d2e051161d71cbcb466';
            $curl_url = 'https://api.github.com/users/' . $user . '/repos';
            $curl_token_auth = 'Authorization: token ' . $token;
            $ch = curl_init($curl_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Awesome-Octocat-App', $curl_token_auth));
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            $output = curl_exec($ch);
            if ($output === false) {
                $output = curl_error($ch);
                echo stripslashes($output);
                curl_close($ch);
            } 
            curl_close($ch);
            $output = json_decode($output);
            $repoItr = 1;
            if (!empty($output)) {
                echo '<div id="repoHead"><i class="fa fa-github fa-2x" aria-hidden="true"></i><span>My Repos</span></div>';
                echo '<div id="repoGroup">';
                foreach ($output as $repo) {
                    if ($repoItr < count($output)) {
                        echo '<div class="repoLink">';
                        echo '<i class="fa fa-code" aria-hidden="true"></i><a href="' . $repo->html_url . '" target="_blank">' . $repo->name . '</a><span class="repoLanguage">' . $repo->language . '</span><br />';
                        echo '</div>';
                    } else {
                        echo '<div class="repoLinkNoBord">';
                        echo '<i class="fa fa-code" aria-hidden="true"></i><a href="' . $repo->html_url . '" target="_blank">' . $repo->name . '</a><span class="repoLanguage">' . $repo->language . '</span><br />';
                        echo '</div>';
                    }
                    $repoItr++;
                }
                echo '</div>';
            }
        ?>
    </div>
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
        <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
        <script type="IN/MemberProfile" data-id="https://www.linkedin.com/in/timveedahl" data-format="inline" data-related="false"></script>
    </div>
</div>
<?php get_footer(); ?>
