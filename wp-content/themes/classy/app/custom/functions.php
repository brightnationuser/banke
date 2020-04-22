<?php
use \Helpers\Kama_Breadcrumbs;

function kama_breadcrumbs( $sep = '>', $l10n = array(), $args = array() ){
    $kb = new Kama_Breadcrumbs;
    echo $kb->get_crumbs( $sep, $l10n, $args );
}