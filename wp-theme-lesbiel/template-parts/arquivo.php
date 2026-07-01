<?php
$autoras = lesbiel_get_autoras();
if (!empty($autoras)) :
?>
<section class="arquivo" id="voz" aria-label="Episódios em áudio">
  <p class="section-label">↘ Voz — episódios em áudio</p>

  <div class="arquivo-grid">
    <?php foreach ($autoras as $i => $autora) :
      $subtitulo = get_post_meta($autora->ID, '_autora_subtitulo', true);
      $link_spotify = get_post_meta($autora->ID, '_autora_link_spotify', true);
      $cor = get_post_meta($autora->ID, '_autora_cor', true) ?: 'verde';
      $img = get_the_post_thumbnail_url($autora->ID, 'medium') ?: '';
      $desc = wp_trim_words(wp_strip_all_tags($autora->post_content), 20);
    ?>
    <article class="arquivo-card">
      <div class="card-number"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></div>
      <figure class="card-img card-img-<?php echo esc_attr($cor); ?>">
        <?php if ($img) : ?>
          <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($autora->post_title); ?>" loading="lazy">
        <?php endif; ?>
        <div class="img-overlay"></div>
      </figure>
      <p class="card-title"><?php echo esc_html($autora->post_title); ?></p>
      <?php if ($subtitulo) : ?>
        <p class="card-subtitle"><?php echo esc_html($subtitulo); ?></p>
      <?php endif; ?>
      <?php if ($desc) : ?>
        <p class="card-text"><?php echo esc_html($desc); ?></p>
      <?php endif; ?>
      <?php if ($link_spotify) : ?>
        <a href="<?php echo esc_url($link_spotify); ?>" class="card-link" target="_blank" rel="noopener">
          Ouvir no Spotify
          <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M2 10L10 2M10 2H4M10 2V8"/></svg>
        </a>
      <?php else : ?>
        <a href="#" class="card-link js-soon">
          Ouvir no Spotify
          <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M2 10L10 2M10 2H4M10 2V8"/></svg>
        </a>
      <?php endif; ?>
    </article>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>
