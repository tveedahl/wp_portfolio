<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package timveedahl
 */

?>
<div class="container">
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info text-center">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <a href="https://twitter.com/t_veedahl" target="_blank"><i class="fa fa-twitter-square fa-3x"></i></a>
                    <a href="https://www.linkedin.com/in/timveedahl/" target="_blank"><i class="fa fa-linkedin-square fa-3x"></i></a>
                    <a href="https://github.com/tveedahl" target="_blank"><i class="fa fa-github-square fa-3x"></i></a>
                </div>
            </div>
            <div class="row copyright">
                <div class="col-lg-4 col-lg-offset-4">
                    <?php echo '&copy;&nbsp;' . date("Y") . ' - timveedahl'; ?>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>

</body>
</html>
