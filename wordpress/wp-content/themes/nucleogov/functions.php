<?php
//adição do style nos arquivos do php
function custom_theme_assets() {
	$css_dir = get_stylesheet_directory_uri() . '/css';

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css');
	wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css');

	wp_enqueue_style('bloco-noticia', $css_dir . '/bloco-noticia.css', []);
}
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );


function my_enqueue_block_assets() {
	$css_dir = get_stylesheet_directory_uri() . '/css';
	$js_dir = get_stylesheet_directory_uri() . '/js';

	wp_enqueue_script('bloco-noticia', $js_dir . '/bloco-noticia.js', [ 'wp-blocks', 'wp-dom' ] , null, true);
	wp_enqueue_style('bloco-noticia', $css_dir . '/bloco-noticia.css', [ 'wp-edit-blocks' ]);
}
add_action('enqueue_block_editor_assets', 'my_enqueue_block_assets');

