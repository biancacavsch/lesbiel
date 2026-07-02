<?php
$textos = lesbiel_get_textos();
?>
<section class="texto-section" id="texto" aria-label="Textos completos">
  <p class="section-label">↘ Texto</p>
  <?php if (!empty($textos)) : ?>
  <ul class="texto-list">
    <?php foreach ($textos as $t) :
      $autora_id = get_post_meta($t->ID, '_texto_autora_id', true);
      $autora_nome = $autora_id ? get_the_title($autora_id) : '';
    ?>
    <li><a href="<?php echo esc_url(get_permalink($t->ID)); ?>"><?php echo esc_html($t->post_title); ?><?php if ($autora_nome) echo ', ' . esc_html($autora_nome); ?> →</a></li>
    <?php endforeach; ?>
  </ul>
  <?php else : ?>
  <ul class="texto-list">
    <li><a href="#">Êxtase, Katherine Mansfield →</a></li>
    <li><a href="#">Desarticulações, Sylvia Molloy →</a></li>
  </ul>
  <?php endif; ?>
</section>