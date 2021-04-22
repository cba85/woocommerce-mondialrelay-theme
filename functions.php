<?php

// Load WooCommerce Mondial Relay style
function mondialrelay_style()
{
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'mondialrelay_style' );

// Load Google Analytics
// /!\ Replace the YOUR_SITE_ID with your own
function google_analytics()
{
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=YOUR_SITE_ID"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'ID');
    </script>
    <?php
}

// Note: I don't use it on demo website, because I don't really care about the traffic of this website, I barely look at that stuff and I don't want to annoy the visitors with a cookie from Google. 👋 Goodbye Google Analytics.
//add_action('wp_head', 'google_analytics');

// Test email
function mailcatcher($phpmailer) {
    $phpmailer->isSMTP();

    $phpmailer->Host = $_ENV['MAIL_HOST'];
    $phpmailer->Port = $_ENV['MAIL_PORT'];

    $phpmailer->SMTPAuth = $_ENV['MAIL_AUTH'];
    $phpmailer->Username = $_ENV['MAIL_USERNAME'];
    $phpmailer->Password = $_ENV['MAIL_PASSWORD'];
}

add_action('phpmailer_init', 'mailcatcher');
