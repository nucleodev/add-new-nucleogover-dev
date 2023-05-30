<?php

get_header();
?>
    <main class="site-main">
        <div class="container">
            <div class="posts">
                <div class="post-title">
                    <h1>ÚLTIMAS NOTÍCIAS</h1>
                    <p><a href="#">VER TODAS AS NOTÍCIAS</a></p>
                </div>
                <div class="post-list">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post(); ?>
                            <article>
                                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                                <?php the_content() ?>
                            </article>
                        <?php endwhile;

                    else :
                        echo '<p>There are no posts!</p>';

                    endif;
                    ?>
                </div>
            </div>
        </div>
    </main>
<?php
get_footer();
?>