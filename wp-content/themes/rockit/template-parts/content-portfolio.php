<?php
/**
 * Template part for displaying portfolio posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rockit
 */

?>

<?php
    /**
     * Checks if portfolio category exists, and creates it otherwise
     */
    $term = term_exists('Portfolio', 'category');
    if ($term !== 0 && $term !== null) {
        /**
         * Check if portfolio category has posts
         */
        $posts_exist = get_posts('category_name=Portfolio');
        if ($posts_exist) {
            /**
             * Loop through and render posts in Portfolio Category
             *
             * # of posts per portfolio page can be set in Admin > Settings > Blog pages show at most # of posts
             *
             */
            $post_count = 1;
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts('paged=' . $paged . '&cat=' . $term["term_id"]);
            echo '<div class="container">';
                echo '<div class="row">';
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                        echo '<div class="col-lg-4">';
                            echo '<h2 class="text-center">';
                                the_title();
                            echo '</h2>';
                            echo '<div class="text-center">';
                                the_content();
                            echo '</div>';
                        echo '</div>';
                        if ($post_count % 3 == 0) {
                            echo '</div>';
                            echo '<div class="row">';
                        }
                        $post_count++;
                    endwhile; endif;
                echo '</div>';
                echo '<div class="row">';
                    echo '<div class="text-center">';
                        the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => __('Previous', 'rockit'),
                            'next_text' => __('Next', 'rockit'),
                        ));
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        } else {
            /**
             * Create dummy posts if none exist
             */
            global $wp_filesystem;
            $posts_json_path = get_template_directory_uri() . "/data/posts.json";
            $posts_contents = $wp_filesystem->get_contents($posts_json_path);
            $posts = json_decode($posts_contents);
            $portfolio_id = get_cat_id("Portfolio");
            foreach ($posts as $post_data) {
                foreach ($post_data as $post) {
                    // Create post object
                    $my_post = array(
                        "post_title"    => $post->post_title,
                        "post_content"  => $post->post_content,
                        "post_status"   => "publish",
                        "post_category" => array($portfolio_id)
                    );
                    wp_insert_post($my_post);
                }
            }

            /**
             * Refresh current page content
             */
            header("Refresh:0");
        }
    } else {
        /**
         * Portfolio category does not exist -- create it
         */
        $parent_term = term_exists( 'Portfolio', 'category' ); // array is returned if taxonomy is given
        $parent_term_id = $parent_term['term_id']; // get numeric term id
        wp_insert_term(
            'Portfolio', // the term
            'category', // the taxonomy
            array(
                'description'=> 'A category to which posts of creative work can be assigned',
                'slug' => 'portfolio',
                'parent'=> $parent_term_id
            )
        );
    }
?>
