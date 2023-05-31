<?php
function custom_theme_assets() {//adição do style nos arquivos do php
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );

function custom_menu_noticias() {//adição do menu de Noticias no menu do admin
    add_menu_page(
        'Adicionar Notícias', // titulo
        'Notícias', // menu
        'manage_options', // capacidade de usuário necessária para acessar o menu
        'editar-noticias', // slug
        'noticias_callback', // callback para exibir o menu
        'dashicons-welcome-write-blog', // icone
        2 // posicao
    );
}
add_action( 'admin_menu', 'custom_menu_noticias' );

function noticias_callback() {
    echo '<h1>Meu Menu Personalizado</h1>';
    echo '<p>Este é o conteúdo do meu menu personalizado.</p>';
}


