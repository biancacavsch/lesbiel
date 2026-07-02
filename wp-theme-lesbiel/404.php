<?php get_header(); ?>

<main id="main" class="site-main" style="min-height:80vh;display:flex;align-items:center;justify-content:center;padding:4rem 3rem;">
  <div style="text-align:center;">
    <h1 style="font-size:3rem;font-weight:700;letter-spacing:-0.05em;color:var(--bege);line-height:1;margin-bottom:1rem;">Página não encontrada</h1>
    <p style="font-size:1rem;color:var(--bege);opacity:0.6;margin-bottom:2rem;">O conteúdo que você procura não está aqui.</p>
    <a href="<?php echo esc_url(home_url('/')); ?>" style="display:inline-block;padding:0.8rem 2rem;background:var(--bege);color:var(--verde);font-size:0.85rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;text-decoration:none;transition:transform 0.2s,opacity 0.2s;">Voltar ao início</a>
  </div>
</main>

<?php get_footer(); ?>
