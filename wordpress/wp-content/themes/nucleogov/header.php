<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">
    <div class="header-bar">
        <div class="container">
            <p class="header-bar-nav">PAGINA INICIAL</p>
        </div>
    </div>
    <div class="header-main-title">
        <div class="container">
                <h1 class="header-title"><a href="<?php echo home_url(); ?>">HORA NEWS</a></h1>
                <h2 class="header-subtitle"><a href="<?php echo home_url(); ?>">NOTÍCIAS</a></h2>
        </div>
    </div>
</header>