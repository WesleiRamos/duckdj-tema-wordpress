<!DOCTYPE html>
<html <?= language_attributes() ?>>
<head>
  <meta charset="<?= bloginfo('charset') ?>">
  <title><?= bloginfo('name') ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?= bloginfo('stylesheet_url') ?>">
  <script>const ASSETS_URL = '<?= get_template_directory_uri() ?>/assets';</script>
  <script src="<?= Assets::js('menu.js') ?>"></script>
<?php if (is_front_page()) { ?>
  <script src="<?= Assets::js('player.js') ?>"></script>
  
<?php }?>
</head>
<body>
  <header>
    <nav class="menu">
      <ul>
        <?php duckdj_theme_render_menu_item() ?>
      </ul>
    </nav>

    <div class="menu-icon invert">
      <img src="<?= Assets::image('menu.svg') ?>">
    </div>

    <nav class="hamburger-menu">
      <div class="logo invert">
        <img src="<?= Assets::image('ducklogo.svg') ?>">
      </div>
      
      <ul>
        <?php duckdj_theme_render_menu_item(true) ?>
      </ul>
    </nav>
  </header>