<?php
/**
 * The header for theme
 */


?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11"><?php

    wp_head();

?></head>
<body <?php body_class(); ?>>

<div id="page" class="site pt-5"><?php
    
    // Top navbar
    ?><nav class="fixed-top navbar navbar-expand-true navbar-dark bg-dark shadow-md">
        <button aria-controls="responsive-navbar-nav" type="button" aria-label="Toggle navigation" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/"><?php esc_url( bloginfo( 'name' ) ); ?></a>
    </nav><?php
