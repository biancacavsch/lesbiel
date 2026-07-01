<?php
$indicar_titulo = get_theme_mod('lesbiel_indica_titulo', 'indica');
$items = lesbiel_get_indica_items();
if (!empty($items)) :
?>
<section class="indica-section" id="indica" aria-label="Recomendações Lesbiel">
  <div class="indica-header">
    <div>
      <p class="section-label">↘ Lesbiel indica</p>
      <h2><?php echo esc_html($indicar_titulo); ?></h2>
    </div>
  </div>

  <div class="indica-grid">
    <?php foreach ($items as $item) :
      $tag = get_post_meta($item->ID, '_indica_tag', true);
      $autor_item = get_post_meta($item->ID, '_indica_autor', true);
      $cor = get_post_meta($item->ID, '_indica_cor', true) ?: 'verde';
      $thumb_texto = get_post_meta($item->ID, '_indica_thumb_texto', true);
      $desc = wp_trim_words(wp_strip_all_tags($item->post_content), 20);
    ?>
    <article class="indica-card">
      <figure class="indica-thumb indica-thumb-<?php echo esc_attr($cor); ?>">
        <span class="indica-thumb-text"><?php echo esc_html($thumb_texto); ?></span>
      </figure>
      <div>
        <p class="indica-card-tag">↘ <?php echo esc_html($tag); ?></p>
        <p class="indica-card-title"><?php echo esc_html($item->post_title); ?></p>
        <?php if ($autor_item) : ?>
          <p class="indica-card-author"><?php echo esc_html($autor_item); ?></p>
        <?php endif; ?>
        <?php if ($desc) : ?>
          <p class="indica-card-text"><?php echo esc_html($desc); ?></p>
        <?php endif; ?>
      </div>
    </article>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>
