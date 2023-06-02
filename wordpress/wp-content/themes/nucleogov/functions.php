<?php
//adição do style nos arquivos do php
function custom_theme_assets() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );


//adiciona suporte para adicionar imagem de destaque no post
add_theme_support( 'post-thumbnails' );

//alteração do menu "POST" do painel admin
function changeMenu() {
    global $menu;
    $menu[5][0] = 'Notícias';
    $menu[5][6] = 'dashicons-welcome-write-blog';
}

add_action('admin_menu', 'changeMenu');
