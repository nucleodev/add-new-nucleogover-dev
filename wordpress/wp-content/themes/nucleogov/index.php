<?php
/*
Template Name: Página de noticias
*/

get_header();
?>
    <main class="site-main">
        <div class="container">
            <div class="posts">
                <div class="post-title">
                    <h1>ÚLTIMAS NOTÍCIAS</h1>
                    <a href="" class="last-news">
                        <p>
                            VER TODAS AS NOTÍCIAS
                        </p>
                        <svg viewBox="-2.4 -2.4 28.80 28.80" xmlns="http://www.w3.org/2000/svg" fill="#69C549"
                             transform="matrix(-1, 0, 0, 1, 0, 0)"
                             style="vertical-align: middle; margin-left: 5px;">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title></title>
                                <g id="Complete">
                                    <g id="browsers">
                                        <g>
                                            <rect fill="none" height="14" rx="2" ry="2" stroke="#69C549"
                                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  width="14" x="3" y="7"></rect>
                                            <path d="M8,3H19a2,2,0,0,1,2,2V16" fill="none" stroke="#69C549"
                                                  stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="post-wrapper">
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
        </div>
    </main>
<?php
get_footer();
?>