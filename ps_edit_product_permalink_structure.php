<?php

add_filter('post_type_link', 'ps_edit_product_permalink_structure', 10, 4);
function ps_edit_product_permalink_structure($post_link, $post, $leavename, $sample) {
    if (false !== strpos($post_link, '%psvendor%')) {
        $ps_vendor_type_term = get_the_terms($post->ID, 'wcpv_product_vendors');
        if (!empty($ps_vendor_type_term))
            $post_link = str_replace('%psvendor%', array_pop($ps_vendor_type_term)->
            slug, $post_link);
        else
            $post_link = str_replace('%psvendor%', 'general', $post_link);
    }
    return $post_link;
}