<?php
    $aboutPageCont = get_page_by_title("About", ARRAY_A);
    echo '<h1 class="text-center">' . $aboutPageContent['post_title'] . '</h1>';
    echo $aboutPageCont["post_content"];
?>