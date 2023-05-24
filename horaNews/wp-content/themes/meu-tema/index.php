<?php
get_header(); // Inclui o cabeçalho do tema
?>

<div id="content">
  <div class="container">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
        ?>
        <h2><?php the_title(); ?></h2>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
        <?php
      }
    }
    ?>
  </div>
</div>

<?php
get_footer(); // Inclui o rodapé do tema


?>


