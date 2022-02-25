<?php

class Assets {
  public static function image($name) {
    return get_template_directory_uri() . '/assets/images/' . $name;
  }

  public static function media_icon($name) {
    return Self::image('media/' . $name);
  }

  public static function js($name) {
    return get_template_directory_uri() . '/assets/js/' . $name;
  }
}

function duckdj_get_menu_name($location) {
  $locations = get_nav_menu_locations();
  if (isset($locations[$location])) {
    return wp_get_nav_menu_object($locations[$location])->name;
  }
  return false;
}

/**
 * Renderiza os itens do menu de navegação
 * @param bool $ignore_logo Se true, ignora o item principal do menu
 */
function duckdj_theme_render_menu_item($ignore_logo = false) {
  $menu_name = duckdj_get_menu_name('primary-menu');
  if (!$menu_name)
    return;

  foreach (wp_get_nav_menu_items($menu_name) as $item) {
    if ($item->title === 'duck_logo') {
      if ($ignore_logo)
        continue;

      echo sprintf('<li class="logo invert"><a href="/"><img src="%s"></a></li>', Assets::image('ducklogo.svg'));
    } else {
      echo sprintf('<li><a href="%s">%s</a></li>', $item->url, $item->title);
    }
  }
}

/**
 * Renderiza os itens das redes sociais
 */
function duckdj_theme_render_social_media_items() {
  $menu_name = duckdj_get_menu_name('social-medias');
  if (!$menu_name)
    return;

  echo '<div class="social-medias">';
  foreach (wp_get_nav_menu_items($menu_name) as $item) {
    echo sprintf('<a href="%s"><img src="%s"></a>', $item->url, Assets::media_icon("$item->title.svg"));
  }
  echo '</div>';
}

register_nav_menus(
  array(
    'primary-menu' => esc_html__('Menu principal', 'duckdj'),
    'social-medias' => esc_html__('Midias sociais', 'duckdj')
  )
);