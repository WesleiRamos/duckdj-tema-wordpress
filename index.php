<?php
get_header(); 

if (is_front_page()) {
  get_template_part('templates/home');
}
else if (is_page()) {
  get_template_part('templates/page');
}

get_footer();