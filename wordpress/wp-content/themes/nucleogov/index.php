<?php
/*
Template Name: Página com Blocos Padrão
*/

get_header();
?>
    <main>
        <div class="container">
            <?php
            while (have_posts()) {
                the_post();
                if (function_exists('render_block')) {
                    $content_blocks = parse_blocks(get_post_field('post_content', get_option('page_on_front')));
                    foreach ($content_blocks as $block) {
                        echo render_block($block);
                    }
                }
            }
            ?>
        </div>
    </main>
<?php
get_footer();
?>