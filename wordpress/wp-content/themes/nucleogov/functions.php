<?php
// Adição do estilo CSS nos arquivos PHP
function custom_theme_assets()
{
    $css_dir = get_stylesheet_directory_uri() . '/css';

    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('header', get_template_directory_uri() . '/css/header.css');
    wp_enqueue_style('footer', get_template_directory_uri() . '/css/footer.css');

    wp_enqueue_style('bloco-noticia', $css_dir . '/bloco-noticia.css', []);
}
add_action('wp_enqueue_scripts', 'custom_theme_assets');

?>

<?php
add_theme_support('post-thumbnails');

function nucleogov_news_block_register() {
    register_block_type('nucleogov/news', array(
        'attributes' => array(
            'postsToShow' => array(
                'type' => 'number',
                'default' => 4,
            ),
        ),
        'render_callback' => 'nucleogov_news_block_render',
    ));
}
add_action('init', 'nucleogov_news_block_register');

function nucleogov_news_block_render($attributes) {
    $postsToShow = $attributes['postsToShow'];

    $args = array(
        'posts_per_page' => $postsToShow,
    );
    $posts = new WP_Query($args);

    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            ?>
            <div class="post-wrapper">
                <?php if (has_post_thumbnail()) { ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php } ?>
                <div class="post-content">
                    <div class="post-date"><?php echo get_the_date(); ?></div>
                    <h2 class="post-title"><?php the_title(); ?></h2>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
    }
}
?>