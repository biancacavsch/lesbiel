<?php
$titulo = get_theme_mod('lesbiel_hero_titulo', 'Lesbiel');
$subtitulo = get_theme_mod('lesbiel_hero_subtitulo', 'Arquivo e voz de mulheres lésbicas e bissexuais');
?>
<section class="hero" aria-label="Introdução">
  <div class="hero-content">
    <div class="hero-title-row">
      <h1 class="hero-main-title"><?php echo esc_html($titulo); ?></h1>
      <p class="hero-subtitle"><?php echo esc_html($subtitulo); ?></p>
    </div>
  </div>

  <div class="hero-footer">
    <nav class="hero-links" aria-label="Navegação principal">
      <?php
      if (has_nav_menu('primary')) {
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container' => false,
          'items_wrap' => '%3$s',
          'link_before' => '',
          'link_after' => '',
          'walker' => new Lesbiel_Hero_Walker(),
        ));
      } else {
        ?>
        <a href="#voz" class="hero-link">VOZ</a>
        <a href="#texto" class="hero-link">TEXTO</a>
        <a href="#sobre" class="hero-link">SOBRE</a>
        <a href="<?php echo esc_url(home_url('/links')); ?>" class="hero-link">LINKS</a>
        <?php
      }
      ?>
    </nav>
  </div>
</section>
