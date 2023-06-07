<?php
//adição do style nos arquivos do php
function custom_theme_assets() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css');
	wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css');
	wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css');
}
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );
