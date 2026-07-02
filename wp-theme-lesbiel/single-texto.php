<?php get_header(); ?>

<?php while (have_posts()) : the_post();
  $titulo_original = get_post_meta(get_the_ID(), '_texto_titulo_original', true);
  $ano = get_post_meta(get_the_ID(), '_texto_ano', true);
  $publicacao = get_post_meta(get_the_ID(), '_texto_publicacao', true);
  $edicao_pt = get_post_meta(get_the_ID(), '_texto_edicao_pt', true);
  $tradutor = get_post_meta(get_the_ID(), '_texto_tradutor', true);
  $fonte_url = get_post_meta(get_the_ID(), '_texto_fonte_url', true);
  $fonte_label = get_post_meta(get_the_ID(), '_texto_fonte_label', true) ?: 'Fonte';
  $epigrafe = get_post_meta(get_the_ID(), '_texto_epigrafe', true);
  $autora_id = get_post_meta(get_the_ID(), '_texto_autora_id', true);

  $autora_nome = '';
  $autora_bio = '';
  $autora_foto = '';
  $autora_foto_credito = '';
  if ($autora_id) {
    $autora_nome = get_the_title($autora_id);
    $autora_bio = get_post_meta($autora_id, '_autora_bio', true);
    $autora_foto = get_the_post_thumbnail_url($autora_id, 'medium') ?: '';
    $autora_foto_credito = get_post_meta($autora_id, '_autora_foto_credito', true);
  }
?>

<div class="text-page-fixed-logo">Lesb<span>iel</span></div>

<main class="text-page">
  <p class="text-page-label">↘ Texto</p>

  <div class="text-page-top">
    <div>
      <h1><?php the_title(); ?></h1>
      <?php if ($autora_nome) : ?>
        <p class="author-link"><?php echo esc_html($autora_nome); ?></p>
      <?php endif; ?>
      <?php if ($autora_bio) : ?>
        <div class="text-page-bio">
          <p class="text-page-bio-label">↘ Biografia</p>
          <p><?php echo esc_html($autora_bio); ?></p>
        </div>
      <?php endif; ?>
    </div>
    <?php if ($autora_foto) : ?>
      <div>
        <figure class="text-page-photo">
          <img src="<?php echo esc_url($autora_foto); ?>" alt="<?php echo esc_attr($autora_nome); ?>" loading="lazy">
        </figure>
        <?php if ($autora_foto_credito) : ?>
          <p class="text-page-photo-credit"><?php echo esc_html($autora_foto_credito); ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="text-page-meta">
    <p class="text-page-meta-label">↘ Ficha técnica</p>
    <?php if ($titulo_original) : ?>
      <p><strong>Título original:</strong> <?php echo esc_html($titulo_original); ?></p>
    <?php endif; ?>
    <?php if ($ano) : ?>
      <p><strong>Escrita em:</strong> <?php echo esc_html($ano); ?></p>
    <?php endif; ?>
    <?php if ($publicacao) : ?>
      <p><strong>Publicação original:</strong> <?php echo esc_html($publicacao); ?></p>
    <?php endif; ?>
    <?php if ($edicao_pt) : ?>
      <p><strong>Edição em português:</strong> <?php echo esc_html($edicao_pt); ?></p>
    <?php endif; ?>
    <?php if ($tradutor) : ?>
      <p><strong>Tradução:</strong> <?php echo esc_html($tradutor); ?></p>
    <?php endif; ?>
    <?php if ($fonte_url && $fonte_label) : ?>
      <p><strong>Fonte:</strong> <a href="<?php echo esc_url($fonte_url); ?>" target="_blank" rel="noopener"><?php echo esc_html($fonte_label); ?></a></p>
    <?php endif; ?>
  </div>

  <article class="text-page-body">
    <?php if ($epigrafe) : ?>
      <p class="epigraph"><?php echo esc_html($epigrafe); ?></p>
    <?php endif; ?>
    <?php the_content(); ?>
  </article>

  <footer>
    <div class="footer-logo">Lesb<span>iel</span></div>
    <p class="footer-note">Arquivo e voz de mulheres lésbicas e bissexuais — <?php echo date('Y'); ?></p>
  </footer>
</main>

<?php endwhile; ?>

<?php wp_footer(); ?>
</body>
</html>
