<?php
/*
Template Name: Indicar Autora
*/
get_header();

$form_key = get_theme_mod('lesbiel_form_key', '70994c59-586d-4209-ad87-db46564b49bd');
$privacidade_url = home_url('/privacidade');
$links_url = home_url('/links');
?>

<main id="main" class="site-main">
  <section class="indicar-section" aria-label="Indicar uma autora">
    <div class="indicar-container">
      <h1 class="indicar-title">Indique uma <span>autora</span></h1>
      <p class="indicar-desc">Sugira autoras e pesquisadoras para integrar o arquivo Lesbiel. Suas indicações nos ajudam a ampliar a voz de mulheres lésbicas e bissexuais na literatura.</p>

      <form class="indicar-form" id="indicarForm" action="https://api.web3forms.com/submit" method="POST">
        <input type="hidden" name="access_key" value="<?php echo esc_attr($form_key); ?>">
        <input type="hidden" name="subject" value="Nova indicação — Lesbiel">
        <input type="hidden" name="from_name" value="Lesbiel — Formulário de Indicação">

        <input type="text" name="website" class="honeypot" tabindex="-1" autocomplete="off">
        <input type="hidden" name="_timestamp" value="">

        <div class="form-group">
          <label for="nome">Seu nome</label>
          <input type="text" id="nome" name="nome" placeholder="Como podemos te chamar?" required maxlength="100">
        </div>

        <div class="form-group">
          <label for="email">Seu email</label>
          <input type="email" id="email" name="email" placeholder="Para contato, se necessário" required maxlength="200">
        </div>

        <div class="form-group">
          <label for="autora">Nome da autora indicada</label>
          <input type="text" id="autora" name="autora" placeholder="Nome completo da autora" required maxlength="200">
        </div>

        <div class="form-group">
          <label for="motivo">Por que essa autora deveria estar no Lesbiel?</label>
          <textarea id="motivo" name="motivo" placeholder="Compartilhe por que essa autora é relevante para o projeto..." required maxlength="2000"></textarea>
        </div>

        <div class="form-consent">
          <input type="checkbox" id="consent" name="consent" required>
          <label for="consent">Li e concordo com a <a href="<?php echo esc_url($privacidade_url); ?>">política de privacidade</a>. Meus dados serão utilizados apenas para contato sobre esta indicação e não serão compartilhados com terceiros.</label>
        </div>

        <button type="submit" class="form-submit">Enviar indicação</button>
      </form>

      <div class="form-success" id="formSuccess">
        <h3>Obrigada!</h3>
        <p>Sua indicação foi recebida. Avaliaremos a sugestão com carinho.</p>
        <a href="<?php echo esc_url($links_url); ?>" class="form-back">← Voltar</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
