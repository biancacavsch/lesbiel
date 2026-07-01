<?php
$sobre_texto = get_theme_mod('lesbiel_sobre_texto', "O Lesbiel é um arquivo digital dedicado à preservação e difusão de textos literários, ensaios e depoimentos de mulheres lésbicas e bissexuais — em português e em inglês.\n\nCada obra é disponibilizada em texto integral no site e em narração original no Spotify, para que a leitura possa ser também uma escuta.\n\nO projeto nasce do desejo de tornar visível o que foi silenciado: uma tradição literária rica, contínua, e ainda pouco conhecida do grande público.");
$paragrafos = explode("\n\n", $sobre_texto);
?>
<section class="sobre-section" id="sobre" aria-label="Sobre o projeto">
  <div>
    <h2>Arquivo<br>e <span>voz</span></h2>
  </div>
  <div>
    <div class="sobre-text">
      <?php foreach ($paragrafos as $p) : ?>
        <p><?php echo esc_html(trim($p)); ?></p>
      <?php endforeach; ?>
    </div>
  </div>
</section>
