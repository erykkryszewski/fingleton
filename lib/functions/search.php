<?php

/* disable pages from search php */
add_action("pre_get_posts", function ($q) {
    if (
        !is_admin() && // Only target front end,
        $q->is_main_query() && // Only target the main query
        $q->is_search() // Only target the search page
    ) {
        $q->set("post_type", ["my_custom_post_type", "post"]);
    }
});
