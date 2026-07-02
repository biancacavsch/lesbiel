<?php
/*
Template Name: Links
*/
get_header();

$spotify_label = get_theme_mod('lesbiel_links_spotify_label', 'Spotify — Episódios em áudio');
$spotify_url = get_theme_mod('lesbiel_links_spotify_url', '#');
$instagram_label = get_theme_mod('lesbiel_links_instagram_label', 'Instagram');
$instagram_url = get_theme_mod('lesbiel_instagram', 'https://www.instagram.com/lesbiel');
$indicar_label = get_theme_mod('lesbiel_links_indicar_label', 'Indicar uma autora');
$site_url = home_url('/');
$indicar_url = home_url('/indicar');
$titulo = get_theme_mod('lesbiel_hero_titulo', 'Lesbiel');
$subtitulo = get_theme_mod('lesbiel_hero_subtitulo', 'Arquivo e voz de mulheres lésbicas e bissexuais');
?>

<main id="main" class="site-main">
  <section class="indicar-section" aria-label="Links">
    <div class="indicar-container links-center">
      <div class="links-logo">
        <?php echo esc_html($titulo); ?>
      </div>
      <p class="links-subtitle">
        <?php echo esc_html($subtitulo); ?>
      </p>

      <div class="links-list">
        <a href="<?php echo esc_url($site_url); ?>" class="link-item">
          <svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
          <span class="link-label">Site Lesbiel</span>
        </a>

        <?php if ($spotify_url && $spotify_url !== '#') : ?>
          <a href="<?php echo esc_url($spotify_url); ?>" class="link-item" target="_blank" rel="noopener">
        <?php else : ?>
          <a href="#" class="link-item js-soon">
        <?php endif; ?>
          <svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><circle cx="12" cy="17" r=".5"/></svg>
          <span class="link-label"><?php echo esc_html($spotify_label); ?></span>
        </a>

        <a href="<?php echo esc_url($instagram_url); ?>" class="link-item" target="_blank" rel="noopener">
          <svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
          <span class="link-label"><?php echo esc_html($instagram_label); ?></span>
        </a>

        <a href="<?php echo esc_url($indicar_url); ?>" class="link-item">
          <svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
          <span class="link-label"><?php echo esc_html($indicar_label); ?></span>
        </a>
      </div>

      <p class="links-footer">
        <a href="<?php echo esc_url($site_url); ?>"><?php echo esc_html(parse_url($site_url, PHP_URL_HOST)); ?></a>
      </p>
    </div>
  </section>
</main>

<?php get_footer(); ?>
