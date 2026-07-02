<?php

function lesbiel_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('editor-styles');

    register_nav_menus(array(
        'primary' => __('Navegação Principal', 'lesbiel'),
    ));
}
add_action('after_setup_theme', 'lesbiel_theme_support');

function lesbiel_enqueue_assets() {
    wp_enqueue_style('lesbiel-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.1');
    wp_enqueue_script('lesbiel-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.1', true);

    if (is_page_template('page-indicar.php')) {
        wp_localize_script('lesbiel-main', 'lesbielForm', array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
        ));
        wp_enqueue_script('lesbiel-form', get_template_directory_uri() . '/assets/js/form.js', array(), '1.0', true);
    }
}
add_action('wp_enqueue_scripts', 'lesbiel_enqueue_assets');

/* ── Customizer ──────────────────────────────────────────────── */

function lesbiel_customize_register($wp_customize) {

    /* ── Seção: Cores do Site ── */
    $wp_customize->add_setting('lesbiel_verde', array('default' => '#264403', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_setting('lesbiel_bege', array('default' => '#e9f2dd', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_setting('lesbiel_preto', array('default' => '#0a0a0a', 'sanitize_callback' => 'sanitize_hex_color'));

    $wp_customize->add_panel('lesbiel_cores', array('title' => 'Lesbiel — Cores', 'priority' => 30));

    $wp_customize->add_section('lesbiel_cores_cores', array('title' => 'Cores do Tema', 'panel' => 'lesbiel_cores'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lesbiel_verde', array('label' => 'Verde (fundo principal)', 'section' => 'lesbiel_cores_cores')));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lesbiel_bege', array('label' => 'Bege (texto / fundo claro)', 'section' => 'lesbiel_cores_cores')));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lesbiel_preto', array('label' => 'Preto (fundo escuro)', 'section' => 'lesbiel_cores_cores')));

    /* ── Seção: Textos do Hero ── */
    $wp_customize->add_setting('lesbiel_hero_titulo', array('default' => 'Lesbiel', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('lesbiel_hero_subtitulo', array('default' => 'Arquivo e voz de mulheres lésbicas e bissexuais', 'sanitize_callback' => 'sanitize_text_field'));

    $wp_customize->add_panel('lesbiel_hero_panel', array('title' => 'Lesbiel — Página Inicial', 'priority' => 31));

    $wp_customize->add_section('lesbiel_hero_sec', array('title' => 'Hero / Topo', 'panel' => 'lesbiel_hero_panel'));
    $wp_customize->add_control('lesbiel_hero_titulo', array('label' => 'Título principal', 'section' => 'lesbiel_hero_sec', 'type' => 'text'));
    $wp_customize->add_control('lesbiel_hero_subtitulo', array('label' => 'Subtítulo', 'section' => 'lesbiel_hero_sec', 'type' => 'textarea'));

    /* ── Seção: Quote / Destaque ── */
    $wp_customize->add_setting('lesbiel_quote_meta', array('default' => 'Bliss', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('lesbiel_quote_obra', array('default' => 'Katherine Mansfield', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('lesbiel_quote_texto', array('default' => '"E as duas mulheres se deixaram ficar ali, lado a lado, olhando para a esguia árvore em flor."', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_setting('lesbiel_quote_autor', array('default' => '— Katherine Mansfield, Bliss', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('lesbiel_quote_img', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_setting('lesbiel_quote_legenda', array('default' => 'Katherine Mansfield, c. 1917', 'sanitize_callback' => 'sanitize_text_field'));

    $wp_customize->add_section('lesbiel_quote_sec', array('title' => 'Destaque Literário (Quote)', 'panel' => 'lesbiel_hero_panel'));
    $wp_customize->add_control('lesbiel_quote_meta', array('label' => 'Label (ex: Bliss)', 'section' => 'lesbiel_quote_sec', 'type' => 'text'));
    $wp_customize->add_control('lesbiel_quote_obra', array('label' => 'Obra / Autora', 'section' => 'lesbiel_quote_sec', 'type' => 'text'));
    $wp_customize->add_control('lesbiel_quote_texto', array('label' => 'Texto da citação', 'section' => 'lesbiel_quote_sec', 'type' => 'textarea'));
    $wp_customize->add_control('lesbiel_quote_autor', array('label' => 'Assinatura', 'section' => 'lesbiel_quote_sec', 'type' => 'text'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'lesbiel_quote_img', array('label' => 'Foto da autora', 'section' => 'lesbiel_quote_sec')));
    $wp_customize->add_control('lesbiel_quote_legenda', array('label' => 'Legenda da foto', 'section' => 'lesbiel_quote_sec', 'type' => 'text'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'lesbiel_quote_img', array('label' => 'Foto da autora', 'section' => 'lesbiel_quote_sec')));
    $wp_customize->add_setting('lesbiel_quote_zoom', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('lesbiel_quote_zoom', array('label' => 'Zoom na foto (1 = sim)', 'section' => 'lesbiel_quote_sec', 'type' => 'checkbox'));

    /* ── Seção: Quote 2 ── */
    $wp_customize->add_setting('lesbiel_quote2_meta', array('default' => 'Desarticulações', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('lesbiel_quote2_obra', array('default' => 'Sylvia Molloy', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('lesbiel_quote2_texto', array('default' => '"Tenho que escrever estes textos enquanto ela ainda está viva, enquanto não houver morte ou encerramento, para tentar entender esse estar/não estar de uma pessoa que se desarticula diante dos meus olhos."', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_setting('lesbiel_quote2_autor', array('default' => '— Sylvia Molloy, Desarticulações', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('lesbiel_quote2_img', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_setting('lesbiel_quote2_legenda', array('default' => 'Sylvia Molloy', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('lesbiel_quote2_zoom', array('default' => '1', 'sanitize_callback' => 'sanitize_text_field'));

    $wp_customize->add_section('lesbiel_quote2_sec', array('title' => 'Destaque 2 (Quote 2)', 'panel' => 'lesbiel_hero_panel'));
    $wp_customize->add_control('lesbiel_quote2_meta', array('label' => 'Label (ex: Desarticulações)', 'section' => 'lesbiel_quote2_sec', 'type' => 'text'));
    $wp_customize->add_control('lesbiel_quote2_obra', array('label' => 'Obra / Autora', 'section' => 'lesbiel_quote2_sec', 'type' => 'text'));
    $wp_customize->add_control('lesbiel_quote2_texto', array('label' => 'Texto da citação', 'section' => 'lesbiel_quote2_sec', 'type' => 'textarea'));
    $wp_customize->add_control('lesbiel_quote2_autor', array('label' => 'Assinatura', 'section' => 'lesbiel_quote2_sec', 'type' => 'text'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'lesbiel_quote2_img', array('label' => 'Foto da autora', 'section' => 'lesbiel_quote2_sec')));
    $wp_customize->add_control('lesbiel_quote2_legenda', array('label' => 'Legenda da foto', 'section' => 'lesbiel_quote2_sec', 'type' => 'text'));
    $wp_customize->add_control('lesbiel_quote2_zoom', array('label' => 'Zoom na foto (1 = sim)', 'section' => 'lesbiel_quote2_sec', 'type' => 'checkbox'));

    /* ── Seção: Indica Título ── */
    $wp_customize->add_setting('lesbiel_indica_titulo', array('default' => 'indica', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_section('lesbiel_indica_sec', array('title' => 'Lesbiel Indica (Título)', 'panel' => 'lesbiel_hero_panel'));
    $wp_customize->add_control('lesbiel_indica_titulo', array('label' => 'Título da seção', 'section' => 'lesbiel_indica_sec', 'type' => 'text'));

    /* ── Seção: Sobre ── */
    $wp_customize->add_setting('lesbiel_sobre_texto', array(
        'default' => "O Lesbiel é um arquivo digital dedicado à preservação e difusão de textos literários, ensaios e depoimentos de mulheres lésbicas e bissexuais — em português e em inglês.\n\nCada obra é disponibilizada em texto integral no site e em narração original no Spotify, para que a leitura possa ser também uma escuta.\n\nO projeto nasce do desejo de tornar visível o que foi silenciado: uma tradição literária rica, contínua, e ainda pouco conhecida do grande público.",
        'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_section('lesbiel_sobre_sec', array('title' => 'Sobre o Projeto', 'panel' => 'lesbiel_hero_panel'));
    $wp_customize->add_control('lesbiel_sobre_texto', array('label' => 'Texto "Sobre"', 'section' => 'lesbiel_sobre_sec', 'type' => 'textarea'));

    /* ── Seção: Links Sociais ── */
    $wp_customize->add_setting('lesbiel_instagram', array('default' => 'https://www.instagram.com/lesbiel', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_setting('lesbiel_spotify', array('default' => '#', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_setting('lesbiel_form_key', array('default' => '70994c59-586d-4209-ad87-db46564b49bd', 'sanitize_callback' => 'sanitize_text_field'));

    $wp_customize->add_panel('lesbiel_social_panel', array('title' => 'Lesbiel — Links e Formulário', 'priority' => 32));

    $wp_customize->add_section('lesbiel_social_sec', array('title' => 'Links Sociais', 'panel' => 'lesbiel_social_panel'));
    $wp_customize->add_control('lesbiel_instagram', array('label' => 'URL do Instagram', 'section' => 'lesbiel_social_sec', 'type' => 'url'));
    $wp_customize->add_control('lesbiel_spotify', array('label' => 'URL do Spotify', 'section' => 'lesbiel_social_sec', 'type' => 'url'));

    $wp_customize->add_section('lesbiel_form_sec', array('title' => 'Formulário Web3Forms', 'panel' => 'lesbiel_social_panel'));
    $wp_customize->add_control('lesbiel_form_key', array('label' => 'Access Key do Web3Forms', 'section' => 'lesbiel_form_sec', 'type' => 'text'));
}
add_action('customize_register', 'lesbiel_customize_register');

function lesbiel_customizer_css() {
    $verde = get_theme_mod('lesbiel_verde', '#264403');
    $bege  = get_theme_mod('lesbiel_bege', '#e9f2dd');
    $preto = get_theme_mod('lesbiel_preto', '#0a0a0a');
    ?>
    <style id="lesbiel-customizer-css">
      :root {
        --verde: <?php echo esc_attr($verde); ?>;
        --verde-mid: <?php echo esc_attr($verde); ?>dd;
        --verde-light: <?php echo esc_attr($verde); ?>aa;
        --bege: <?php echo esc_attr($bege); ?>;
        --bege-mid: <?php echo esc_attr($bege); ?>dd;
        --bege-dark: <?php echo esc_attr($bege); ?>bb;
        --preto: <?php echo esc_attr($preto); ?>;
      }
    </style>
    <?php
}
add_action('wp_head', 'lesbiel_customizer_css');

/* ── Custom Walker for Hero Nav ── */

class Lesbiel_Hero_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '<a href="' . esc_url($item->url) . '" class="hero-link">' . esc_html($item->title) . '</a>';
    }
}

/* ── Custom Post Type: Autoras (arquivo) ── */

function lesbiel_register_cpts() {
    register_post_type('autora', array(
        'labels' => array(
            'name'          => 'Autoras',
            'singular_name' => 'Autora',
            'add_new_item'  => 'Adicionar nova autora',
            'edit_item'     => 'Editar autora',
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-welcome-write-blog',
        'supports'     => array('title', 'editor', 'thumbnail'),
        'rewrite'      => array('slug' => 'autora'),
        'show_in_rest' => true,
    ));

    register_post_type('indica_item', array(
        'labels' => array(
            'name'          => 'Indica',
            'singular_name' => 'Indicação',
            'add_new_item'  => 'Adicionar nova indicação',
            'edit_item'     => 'Editar indicação',
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-heart',
        'supports'     => array('title', 'editor', 'thumbnail'),
        'rewrite'      => array('slug' => 'indica'),
        'show_in_rest' => true,
    ));

    register_post_type('texto', array(
        'labels' => array(
            'name'          => 'Textos',
            'singular_name' => 'Texto',
            'add_new_item'  => 'Adicionar novo texto',
            'edit_item'     => 'Editar texto',
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-book-alt',
        'supports'     => array('title', 'editor', 'thumbnail'),
        'rewrite'      => array('slug' => 'texto'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'lesbiel_register_cpts');

/* ── Meta Boxes para Autoras ── */

function lesbiel_autora_meta_boxes() {
    add_meta_box('autora_dados', 'Dados da Autora', 'autora_dados_cb', 'autora', 'normal', 'high');
}
add_action('add_meta_boxes', 'lesbiel_autora_meta_boxes');

function autora_dados_cb($post) {
    wp_nonce_field('autora_meta', 'autora_nonce');
    $subtitulo = get_post_meta($post->ID, '_autora_subtitulo', true);
    $link_spotify = get_post_meta($post->ID, '_autora_link_spotify', true);
    $cor = get_post_meta($post->ID, '_autora_cor', true);
    $bio = get_post_meta($post->ID, '_autora_bio', true);
    $foto_credito = get_post_meta($post->ID, '_autora_foto_credito', true);
    ?>
    <p><label>Subtítulo (ex: Bliss, 1920)</label><br>
    <input type="text" name="autora_subtitulo" value="<?php echo esc_attr($subtitulo); ?>" style="width:100%"></p>

    <p><label>Biografia (para página do texto)</label><br>
    <textarea name="autora_bio" style="width:100%;min-height:100px" placeholder="Katherine Mansfield (1888–1923) foi uma escritora..."><?php echo esc_textarea($bio); ?></textarea></p>

    <p><label>Crédito da foto (opcional, ex: HyperDarkLink, CC BY-SA 4.0)</label><br>
    <input type="text" name="autora_foto_credito" value="<?php echo esc_attr($foto_credito); ?>" style="width:100%"></p>

    <p><label>Link do Spotify</label><br>
    <input type="url" name="autora_link_spotify" value="<?php echo esc_url($link_spotify); ?>" style="width:100%"></p>

    <p><label>Cor de fundo do card</label><br>
    <select name="autora_cor">
        <option value="verde" <?php selected($cor, 'verde'); ?>>Verde</option>
        <option value="bege-dark" <?php selected($cor, 'bege-dark'); ?>>Bege escuro</option>
        <option value="bege-mid" <?php selected($cor, 'bege-mid'); ?>>Bege médio</option>
    </select></p>
    <?php
}

function lesbiel_save_autora_meta($post_id) {
    if (!isset($_POST['autora_nonce']) || !wp_verify_nonce($_POST['autora_nonce'], 'autora_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['autora_subtitulo'])) update_post_meta($post_id, '_autora_subtitulo', sanitize_text_field($_POST['autora_subtitulo']));
    if (isset($_POST['autora_bio'])) update_post_meta($post_id, '_autora_bio', sanitize_textarea_field($_POST['autora_bio']));
    if (isset($_POST['autora_foto_credito'])) update_post_meta($post_id, '_autora_foto_credito', sanitize_text_field($_POST['autora_foto_credito']));
    if (isset($_POST['autora_link_spotify'])) update_post_meta($post_id, '_autora_link_spotify', esc_url_raw($_POST['autora_link_spotify']));
    if (isset($_POST['autora_cor'])) update_post_meta($post_id, '_autora_cor', sanitize_text_field($_POST['autora_cor']));
}
add_action('save_post_autora', 'lesbiel_save_autora_meta');

/* ── Meta Boxes para Indica ── */

function lesbiel_indica_meta_boxes() {
    add_meta_box('indica_dados', 'Dados da Indicação', 'indica_dados_cb', 'indica_item', 'normal', 'high');
}
add_action('add_meta_boxes', 'lesbiel_indica_meta_boxes');

function indica_dados_cb($post) {
    wp_nonce_field('indica_meta', 'indica_nonce');
    $tag = get_post_meta($post->ID, '_indica_tag', true);
    $autor = get_post_meta($post->ID, '_indica_autor', true);
    $cor = get_post_meta($post->ID, '_indica_cor', true);
    $thumb_texto = get_post_meta($post->ID, '_indica_thumb_texto', true);
    ?>
    <p><label>Categoria (ex: Cinema, Literatura)</label><br>
    <input type="text" name="indica_tag" value="<?php echo esc_attr($tag); ?>" style="width:100%"></p>

    <p><label>Autora / Diretora</label><br>
    <input type="text" name="indica_autor" value="<?php echo esc_attr($autor); ?>" style="width:100%"></p>

    <p><label>Texto da miniatura</label><br>
    <input type="text" name="indica_thumb_texto" value="<?php echo esc_attr($thumb_texto); ?>" style="width:100%"></p>

    <p><label>Cor de fundo</label><br>
    <select name="indica_cor">
        <option value="verde" <?php selected($cor, 'verde'); ?>>Verde</option>
        <option value="bege-dark" <?php selected($cor, 'bege-dark'); ?>>Bege escuro</option>
        <option value="bege-mid" <?php selected($cor, 'bege-mid'); ?>>Bege médio</option>
    </select></p>
    <?php
}

function lesbiel_save_indica_meta($post_id) {
    if (!isset($_POST['indica_nonce']) || !wp_verify_nonce($_POST['indica_nonce'], 'indica_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['indica_tag'])) update_post_meta($post_id, '_indica_tag', sanitize_text_field($_POST['indica_tag']));
    if (isset($_POST['indica_autor'])) update_post_meta($post_id, '_indica_autor', sanitize_text_field($_POST['indica_autor']));
    if (isset($_POST['indica_cor'])) update_post_meta($post_id, '_indica_cor', sanitize_text_field($_POST['indica_cor']));
    if (isset($_POST['indica_thumb_texto'])) update_post_meta($post_id, '_indica_thumb_texto', sanitize_text_field($_POST['indica_thumb_texto']));
}
add_action('save_post_indica_item', 'lesbiel_save_indica_meta');

/* ── Meta Boxes para Textos ── */

function lesbiel_texto_meta_boxes() {
    add_meta_box('texto_dados', 'Dados do Texto', 'texto_dados_cb', 'texto', 'normal', 'high');
}
add_action('add_meta_boxes', 'lesbiel_texto_meta_boxes');

function texto_dados_cb($post) {
    wp_nonce_field('texto_meta', 'texto_nonce');
    $titulo_original = get_post_meta($post->ID, '_texto_titulo_original', true);
    $ano = get_post_meta($post->ID, '_texto_ano', true);
    $publicacao = get_post_meta($post->ID, '_texto_publicacao', true);
    $edicao_pt = get_post_meta($post->ID, '_texto_edicao_pt', true);
    $tradutor = get_post_meta($post->ID, '_texto_tradutor', true);
    $fonte_url = get_post_meta($post->ID, '_texto_fonte_url', true);
    $fonte_label = get_post_meta($post->ID, '_texto_fonte_label', true);
    $epigrafe = get_post_meta($post->ID, '_texto_epigrafe', true);
    $autora_id = get_post_meta($post->ID, '_texto_autora_id', true);
    ?>
    <p><label>Título original (quando diferente do português)</label><br>
    <input type="text" name="texto_titulo_original" value="<?php echo esc_attr($titulo_original); ?>" style="width:100%" placeholder="ex: Bliss"></p>

    <p><label>Ano de escrita</label><br>
    <input type="text" name="texto_ano" value="<?php echo esc_attr($ano); ?>" style="width:100%" placeholder="ex: 1918"></p>

    <p><label>Publicação original</label><br>
    <input type="text" name="texto_publicacao" value="<?php echo esc_attr($publicacao); ?>" style="width:100%" placeholder="ex: English Review, 1918"></p>

    <p><label>Edição em português (opcional)</label><br>
    <input type="text" name="texto_edicao_pt" value="<?php echo esc_attr($edicao_pt); ?>" style="width:100%" placeholder="ex: Editora 34, 2015"></p>

    <p><label>Tradutor(a) (opcional)</label><br>
    <input type="text" name="texto_tradutor" value="<?php echo esc_attr($tradutor); ?>" style="width:100%" placeholder="ex: Paloma Vidal"></p>

    <p><label>URL da fonte</label><br>
    <input type="url" name="texto_fonte_url" value="<?php echo esc_url($fonte_url); ?>" style="width:100%" placeholder="https://..."></p>

    <p><label>Label da fonte</label><br>
    <input type="text" name="texto_fonte_label" value="<?php echo esc_attr($fonte_label); ?>" style="width:100%" placeholder="ex: Project Gutenberg"></p>

    <p><label>Epígrafe (opcional)</label><br>
    <textarea name="texto_epigrafe" style="width:100%" rows="2" placeholder="ex: para ML., que ainda está"><?php echo esc_textarea($epigrafe); ?></textarea></p>

    <p><label>Link da autora</label><br>
    <?php
    $q = new WP_Query(array('post_type' => 'autora', 'posts_per_page' => 50, 'orderby' => 'title', 'order' => 'ASC'));
    if ($q->have_posts()) :
    ?>
    <select name="texto_autora_id" style="width:100%">
      <option value="">— Selecionar autora —</option>
      <?php while ($q->have_posts()) : $q->the_post(); ?>
        <option value="<?php the_ID(); ?>" <?php selected($autora_id, get_the_ID()); ?>><?php the_title(); ?></option>
      <?php endwhile; wp_reset_postdata(); ?>
    </select>
    <?php endif; ?>
    </p>
    <?php
}

function lesbiel_save_texto_meta($post_id) {
    if (!isset($_POST['texto_nonce']) || !wp_verify_nonce($_POST['texto_nonce'], 'texto_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['texto_titulo_original'])) update_post_meta($post_id, '_texto_titulo_original', sanitize_text_field($_POST['texto_titulo_original']));
    if (isset($_POST['texto_ano'])) update_post_meta($post_id, '_texto_ano', sanitize_text_field($_POST['texto_ano']));
    if (isset($_POST['texto_publicacao'])) update_post_meta($post_id, '_texto_publicacao', sanitize_text_field($_POST['texto_publicacao']));
    if (isset($_POST['texto_edicao_pt'])) update_post_meta($post_id, '_texto_edicao_pt', sanitize_text_field($_POST['texto_edicao_pt']));
    if (isset($_POST['texto_tradutor'])) update_post_meta($post_id, '_texto_tradutor', sanitize_text_field($_POST['texto_tradutor']));
    if (isset($_POST['texto_fonte_url'])) update_post_meta($post_id, '_texto_fonte_url', esc_url_raw($_POST['texto_fonte_url']));
    if (isset($_POST['texto_fonte_label'])) update_post_meta($post_id, '_texto_fonte_label', sanitize_text_field($_POST['texto_fonte_label']));
    if (isset($_POST['texto_epigrafe'])) update_post_meta($post_id, '_texto_epigrafe', sanitize_textarea_field($_POST['texto_epigrafe']));
    if (isset($_POST['texto_autora_id'])) update_post_meta($post_id, '_texto_autora_id', intval($_POST['texto_autora_id']));
}
add_action('save_post_texto', 'lesbiel_save_texto_meta');

/* ── Helper: get autora card data ── */

function lesbiel_get_autoras() {
    $q = new WP_Query(array(
        'post_type'      => 'autora',
        'posts_per_page' => 10,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ));
    return $q->posts;
}

function lesbiel_get_indica_items() {
    $q = new WP_Query(array(
        'post_type'      => 'indica_item',
        'posts_per_page' => 10,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ));
    return $q->posts;
}

function lesbiel_get_textos() {
    $q = new WP_Query(array(
        'post_type'      => 'texto',
        'posts_per_page' => 50,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ));
    return $q->posts;
}

/* ── Pagina de Links: campos Customizer ── */

function lesbiel_links_customize($wp_customize) {
    $wp_customize->add_setting('lesbiel_links_spotify_label', array('default' => 'Spotify — Episódios em áudio', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('lesbiel_links_spotify_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_setting('lesbiel_links_instagram_label', array('default' => 'Instagram', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('lesbiel_links_indicar_label', array('default' => 'Indicar uma autora', 'sanitize_callback' => 'sanitize_text_field'));

    $wp_customize->add_section('lesbiel_links_sec', array('title' => 'Página Links', 'panel' => 'lesbiel_social_panel'));
    $wp_customize->add_control('lesbiel_links_spotify_label', array('label' => 'Label Spotify', 'section' => 'lesbiel_links_sec', 'type' => 'text'));
    $wp_customize->add_control('lesbiel_links_spotify_url', array('label' => 'URL Spotify', 'section' => 'lesbiel_links_sec', 'type' => 'url'));
    $wp_customize->add_control('lesbiel_links_instagram_label', array('label' => 'Label Instagram', 'section' => 'lesbiel_links_sec', 'type' => 'text'));
    $wp_customize->add_control('lesbiel_links_indicar_label', array('label' => 'Label Indicar', 'section' => 'lesbiel_links_sec', 'type' => 'text'));
}
add_action('customize_register', 'lesbiel_links_customize');
