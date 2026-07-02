<?php
$q1_meta = get_theme_mod('lesbiel_quote_meta', 'Êxtase');
$q1_obra = get_theme_mod('lesbiel_quote_obra', 'Katherine Mansfield');
$q1_texto = get_theme_mod('lesbiel_quote_texto', '"E as duas mulheres se deixaram ficar ali, lado a lado, olhando para a esguia árvore em flor. Embora imóvel, a árvore parecia estender-se para cima, subir, tremer no ar brilhante como a chama de uma vela, e crescer, crescer mais alto diante delas — quase tocar a borda da lua cheia prateada."');
$q1_autor = get_theme_mod('lesbiel_quote_autor', '— Katherine Mansfield, Êxtase');
$q1_img = get_theme_mod('lesbiel_quote_img', '');
$q1_legenda = get_theme_mod('lesbiel_quote_legenda', 'Katherine Mansfield, c. 1917');
$q1_zoom = get_theme_mod('lesbiel_quote_zoom', '');

$q2_meta = get_theme_mod('lesbiel_quote2_meta', 'Desarticulações');
$q2_obra = get_theme_mod('lesbiel_quote2_obra', 'Sylvia Molloy');
$q2_texto = get_theme_mod('lesbiel_quote2_texto', '"Tenho que escrever estes textos enquanto ela ainda está viva, enquanto não houver morte ou encerramento, para tentar entender esse estar/não estar de uma pessoa que se desarticula diante dos meus olhos."');
$q2_autor = get_theme_mod('lesbiel_quote2_autor', '— Sylvia Molloy, Desarticulações');
$q2_img = get_theme_mod('lesbiel_quote2_img', '');
$q2_legenda = get_theme_mod('lesbiel_quote2_legenda', 'Sylvia Molloy');
$q2_zoom = get_theme_mod('lesbiel_quote2_zoom', '1');
?>
<section class="quote-section" id="destaque" aria-label="Destaque literário">
  <div class="quote-carousel">
    <div class="quote-slide active">
      <div>
        <p class="quote-work"><?php echo esc_html($q1_obra); ?></p>
        <blockquote><?php echo wp_kses_post($q1_texto); ?></blockquote>
        <p class="quote-author"><?php echo esc_html($q1_autor); ?></p>
      </div>
      <div class="quote-img-side">
        <figure class="quote-photo<?php if ($q1_zoom) echo ' quote-photo-zoom'; ?>">
          <?php if ($q1_img) : ?>
            <img src="<?php echo esc_url($q1_img); ?>" alt="<?php echo esc_attr($q1_obra); ?>" loading="lazy">
          <?php endif; ?>
          <div class="photo-overlay"></div>
          <figcaption class="quote-photo-label"><?php echo esc_html($q1_legenda); ?></figcaption>
        </figure>
      </div>
    </div>

    <div class="quote-slide">
      <div>
        <p class="quote-work"><?php echo esc_html($q2_obra); ?></p>
        <blockquote><?php echo wp_kses_post($q2_texto); ?></blockquote>
        <p class="quote-author"><?php echo esc_html($q2_autor); ?></p>
      </div>
      <div class="quote-img-side">
        <figure class="quote-photo<?php if ($q2_zoom) echo ' quote-photo-zoom'; ?>">
          <?php if ($q2_img) : ?>
            <img src="<?php echo esc_url($q2_img); ?>" alt="<?php echo esc_attr($q2_obra); ?>" loading="lazy">
          <?php endif; ?>
          <div class="photo-overlay"></div>
          <figcaption class="quote-photo-label"><?php echo esc_html($q2_legenda); ?></figcaption>
        </figure>
      </div>
    </div>
  </div>

  <div class="quote-dots">
    <button class="quote-dot active" data-index="0" aria-label="Citação 1"></button>
    <button class="quote-dot" data-index="1" aria-label="Citação 2"></button>
  </div>
</section>
