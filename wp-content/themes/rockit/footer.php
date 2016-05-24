<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rockit
 */

?>
<div class="container">
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info text-center">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter-square fa-3x"></i></a>
                    <a href="http://facebook.com" target="_blank"><i class="fa fa-facebook-square fa-3x"></i></a>
                    <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin-square fa-3x"></i></a>
                    <a href="https://bitbucket.org/" target="_blank"><i class="fa fa-bitbucket-square fa-3x"></i></a>
                </div>
            </div>
            <div class="row copyright">
                <div class="col-lg-4 col-lg-offset-4">
                    <?php echo '&copy;&nbsp;' . date("Y") . ' - Rockit'; ?>
                </div>
            </div>
        </div>
    </footer>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/bootstrap.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>
