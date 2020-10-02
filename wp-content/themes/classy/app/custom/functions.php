<?php
use \Helpers\Kama_Breadcrumbs;

function kama_breadcrumbs( $sep = '>', $l10n = array(), $args = array() ){
    $kb = new Kama_Breadcrumbs;
    echo $kb->get_crumbs( $sep, $l10n, $args );
}

/**
 * Get Alt attribute
 *
 * @param int $attachment_id
 *
 * @return string
 */
function wp_get_image_alt( $attachment_id ) {
    return trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
}
