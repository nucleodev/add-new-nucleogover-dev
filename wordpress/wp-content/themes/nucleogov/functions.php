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
            $thumbnail = get_the_post_thumbnail(); // pega a thumb adicionada
            $data = get_the_date('d M Y'); // pega a data
            $titulo = get_the_title(); // titulo do post
            ?>
            <div class="posts-recent">
                <a href="">
                    <div class="post-news">
                        <div class="post-thumb">
                            <?php if ($thumbnail): ?>
                                <?php echo '<img width="280px" height="200px" src="' . $thumbnail; ?>
                            <?php endif; ?>
                        </div>
                        <div class="post-desc">
                            <div class="date-wrapper">
                                <?php echo "$data"; ?>
                            </div>
                            <div class="titulo-wrapper">
                                <?php echo "$titulo"; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
        wp_reset_postdata();
    }
}
?>