<?php
function meu_tema_setup() {
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'meu_tema_setup');
