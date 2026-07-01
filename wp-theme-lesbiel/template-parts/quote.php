<?php
$meta = get_theme_mod('lesbiel_quote_meta', 'Bliss');
$obra = get_theme_mod('lesbiel_quote_obra', 'Katherine Mansfield');
$texto = get_theme_mod('lesbiel_quote_texto', '"E as duas mulheres se deixaram ficar ali, lado a lado, olhando para a esguia árvore em flor."');
$autor = get_theme_mod('lesbiel_quote_autor', '— Katherine Mansfield, Bliss');
$img = get_theme_mod('lesbiel_quote_img', '');
$legenda = get_theme_mod('lesbiel_quote_legenda', 'Katherine Mansfield, c. 1917');
?>
<section class="quote-section" id="destaque" aria-label="Destaque literário">
  <div>
    <p class="quote-meta">↘ <?php echo esc_html($meta); ?></p>
    <p class="quote-work"><?php echo esc_html($obra); ?></p>
    <blockquote>
      <?php echo wp_kses_post($texto); ?>
    </blockquote>
    <p class="quote-author"><?php echo esc_html($autor); ?></p>
  </div>
  <div class="quote-img-side">
    <figure class="quote-photo">
      <?php if ($img) : ?>
        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($obra); ?>" loading="lazy">
      <?php endif; ?>
      <div class="photo-overlay"></div>
      <figcaption class="quote-photo-label"><?php echo esc_html($legenda); ?></figcaption>
    </figure>
  </div>
</section>
