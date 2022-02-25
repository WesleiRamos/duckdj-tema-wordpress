  <footer>
    <?= duckdj_theme_render_social_media_items() ?>

    <div class="copy">
      <span>&copy; <?php echo date('Y'); ?></span>
      <img class="invert" src="<?= Assets::image('ducklogo.svg') ?>">
      <span>DuckDJ</span>
    </div>

    <div class="privacy-terms">
      <a class="terms" href="#terms-of-use">
        Termos de uso
      </a>

      <a title="Weslei Ramos" href="http://wesleiramos.epizy.com" >
        <img class="invert" src="<?= Assets::image('wlogo.svg') ?>">
      </a>

      <a href="/politica-de-privacidade">
        Política de privacidade
      </a>
    </div>
  </footer>
</body>
</html>