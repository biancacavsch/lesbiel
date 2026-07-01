<?php
$texto_page = get_page_by_path('texto');
if ($texto_page) :
  $content = apply_filters('the_content', $texto_page->post_content);
?>
<section class="texto-section" id="texto" aria-label="Textos completos">
  <div class="texto-content">
    <div class="texto-body">
      <?php echo $content; ?>
    </div>
  </div>
</section>
<?php endif; ?>
