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
                            <?php
                                $page = get_page_by_title('Footer', OBJECT, 'post');
                                echo '<footer id="colophon" class="site-footer" role="contentinfo">';
                                echo $page->post_content;
                            ?>
                        </div>
                    </div>
                    <div class="row copyright">
                        <div class="col-lg-4 col-lg-offset-4">
                            <?php echo '&copy;&nbsp;' . date("Y") . ' - Tim Veedahl'; ?>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
