<?php
/*
Template Name: Privacidade
*/
get_header();

$indicar_url = home_url('/indicar');
?>

<main id="main" class="site-main">
  <div class="privacy-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    <?php endwhile; endif; ?>
  </div>

  <a href="<?php echo esc_url($indicar_url); ?>" class="back-link">← Voltar ao formulário</a>
</main>

<?php get_footer(); ?>
