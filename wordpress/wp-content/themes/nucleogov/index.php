<?php
get_header(); ?>

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
            <div class="posts-recent">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // pagina atual
                $args = array(
                    'post_type' => 'post',
                    'paged' => $paged
                );// Define os argumentos da consulta para buscar posts e usar a pagina atual definida acima

                $query = new WP_Query($args); // Executa a consulta com os argumentos definidos

                if (have_posts()): while (have_posts()): the_post();
                    $thumbnail = get_the_post_thumbnail(); // pega a thumb adicionada
                    $data = get_the_date('d M Y'); // pega a data
                    $titulo = get_the_title(); // titulo do post
                    ?>
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
                <?php endwhile; endif; ?>
            </div>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'next_text' => sprintf('%1$s <p></p>', __('»', 'text-domain')),
                    'prev_text' => sprintf('<p></p> %1$s', __('«', 'text-domain'))
                ));//mostra a paginação, a sequencia, e altera os valores padrões de texto do paginete_links
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
