<?php
    $aboutPage = get_page_by_title('About', ARRAY_A);
    echo '<h1 class="text-center">' . $aboutPage['post_title'] . '</h1>';
    echo $aboutPage['post_content'];
?>
