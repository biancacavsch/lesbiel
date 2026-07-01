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
    <div class="indicar-container" style="text-align:center;">
      <div class="links-logo" style="font-size:2.5rem;font-weight:700;letter-spacing:-0.05em;margin-bottom:0.5rem;color:var(--bege);">
        <?php echo esc_html($titulo); ?>
      </div>
      <p class="links-subtitle" style="font-size:0.75rem;text-transform:uppercase;letter-spacing:0.1em;opacity:0.6;margin-bottom:3rem;color:var(--bege);">
        <?php echo esc_html($subtitulo); ?>
      </p>

      <div class="links-list" style="display:flex;flex-direction:column;gap:0.75rem;max-width:420px;margin:0 auto;">
        <a href="<?php echo esc_url($site_url); ?>" class="link-item" style="display:flex;align-items:center;gap:1rem;background:rgba(233,242,221,0.08);border:1px solid rgba(233,242,221,0.15);padding:1rem 1.5rem;text-decoration:none;color:var(--bege);transition:background 0.3s,transform 0.2s;border-radius:4px;">
          <svg class="link-icon" style="width:20px;height:20px;flex-shrink:0;opacity:0.7;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
          <span class="link-label" style="font-size:0.85rem;font-weight:500;text-transform:uppercase;letter-spacing:0.08em;">Site Lesbiel</span>
        </a>

        <?php if ($spotify_url && $spotify_url !== '#') : ?>
          <a href="<?php echo esc_url($spotify_url); ?>" class="link-item" target="_blank" rel="noopener" style="display:flex;align-items:center;gap:1rem;background:rgba(233,242,221,0.08);border:1px solid rgba(233,242,221,0.15);padding:1rem 1.5rem;text-decoration:none;color:var(--bege);transition:background 0.3s,transform 0.2s;border-radius:4px;">
        <?php else : ?>
          <a href="#" class="link-item js-soon" style="display:flex;align-items:center;gap:1rem;background:rgba(233,242,221,0.08);border:1px solid rgba(233,242,221,0.15);padding:1rem 1.5rem;text-decoration:none;color:var(--bege);transition:background 0.3s,transform 0.2s;border-radius:4px;">
        <?php endif; ?>
          <svg class="link-icon" style="width:20px;height:20px;flex-shrink:0;opacity:0.7;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><circle cx="12" cy="17" r=".5"/></svg>
          <span class="link-label" style="font-size:0.85rem;font-weight:500;text-transform:uppercase;letter-spacing:0.08em;"><?php echo esc_html($spotify_label); ?></span>
        </a>

        <a href="<?php echo esc_url($instagram_url); ?>" class="link-item" target="_blank" rel="noopener" style="display:flex;align-items:center;gap:1rem;background:rgba(233,242,221,0.08);border:1px solid rgba(233,242,221,0.15);padding:1rem 1.5rem;text-decoration:none;color:var(--bege);transition:background 0.3s,transform 0.2s;border-radius:4px;">
          <svg class="link-icon" style="width:20px;height:20px;flex-shrink:0;opacity:0.7;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
          <span class="link-label" style="font-size:0.85rem;font-weight:500;text-transform:uppercase;letter-spacing:0.08em;"><?php echo esc_html($instagram_label); ?></span>
        </a>

        <a href="<?php echo esc_url($indicar_url); ?>" class="link-item" style="display:flex;align-items:center;gap:1rem;background:rgba(233,242,221,0.08);border:1px solid rgba(233,242,221,0.15);padding:1rem 1.5rem;text-decoration:none;color:var(--bege);transition:background 0.3s,transform 0.2s;border-radius:4px;">
          <svg class="link-icon" style="width:20px;height:20px;flex-shrink:0;opacity:0.7;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
          <span class="link-label" style="font-size:0.85rem;font-weight:500;text-transform:uppercase;letter-spacing:0.08em;"><?php echo esc_html($indicar_label); ?></span>
        </a>
      </div>

      <p class="links-footer" style="margin-top:3rem;font-size:0.7rem;opacity:0.4;letter-spacing:0.04em;color:var(--bege);">
        <a href="<?php echo esc_url($site_url); ?>" style="color:var(--bege);text-decoration:none;"><?php echo esc_html(parse_url($site_url, PHP_URL_HOST)); ?></a>
      </p>
    </div>
  </section>
</main>

<?php get_footer(); ?>
