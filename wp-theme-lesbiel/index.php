<?php get_header(); ?>

<main id="main" class="site-main">
  <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
          <div class="entry-meta">
            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
              <?php echo esc_html(get_the_date()); ?>
            </time>
          </div>
        </header>
        <div class="entry-summary">
          <?php the_excerpt(); ?>
        </div>
      </article>
      <?php
    endwhile;
    the_posts_navigation();
  else :
    ?>
    <p><?php esc_html_e('Nenhum conteúdo encontrado.', 'lesbiel'); ?></p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
