/*
 * build.js — geração estática do site Lesbiel.
 * Lê content.js e os templates em templates/ e produz index.html e links.html
 * com o conteúdo já incorporado (HTML estático -> SEO ideal).
 * Uso: node build.js   (comando de build no Cloudflare Pages)
 */
const fs = require('fs');
const path = require('path');

/* ---- Carrega content.js (roda o arquivo num sandbox com "window") -------- */
const contentCode = fs.readFileSync(path.join(__dirname, 'content.js'), 'utf8');
const sandbox = { window: {} };
new Function('window', contentCode)(sandbox.window);
const DATA = sandbox.window.LESBIEL || {};

const ICONS = {
  site: '<svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>',
  spotify: '<svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M7 9c4-1 8-0.5 11 1.5M7.5 12.5c3.5-0.8 6.5-0.4 9 1M8 15.5c3-0.6 5.2-0.3 7 0.8"/></svg>',
  instagram: '<svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>',
  form: '<svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>'
};

const ARROW = '<svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M2 10L10 2M10 2H4M10 2V8"/></svg>';

function esc(s) { return String(s == null ? '' : s); }

function vozCard(c) {
  const isSoon = c.soon || !c.link || c.link === '#';
  const inner =
    '<div class="card-number">' + esc(c.number) + '</div>' +
    '<figure class="card-img ' + esc(c.imgClass || 'card-img-verde') + '">' +
      '<img src="' + esc(c.img) + '" alt="' + esc(c.alt) + '" loading="lazy" onerror="this.style.display=\'none\'">' +
      '<div class="img-overlay"></div>' +
    '</figure>' +
    '<p class="card-title">' + esc(c.title) + '</p>' +
    '<p class="card-subtitle">' + esc(c.subtitle) + '</p>' +
    '<p class="card-text">' + esc(c.text) + '</p>' +
    '<span class="card-link">Escute o episódio completo ' + ARROW + '</span>';
  if (isSoon) {
    return '<article class="arquivo-card js-soon" role="button" tabindex="0" aria-label="Em breve: ' + esc(c.title) + '">' + inner + '</article>';
  }
  return '<a class="arquivo-card card-link-real" href="' + esc(c.link) + '" target="_blank" rel="noopener">' + inner + '</a>';
}

function buildVoz() {
  return (DATA.voz || []).map(vozCard).join('');
}

function buildQuotes() {
  const slides = (DATA.quotes || []).map(function (q, i) {
    const zoomCls = q.zoom ? ' quote-photo-zoom' : '';
    return '' +
      '<div class="quote-slide' + (i === 0 ? ' active' : '') + '">' +
        '<div>' +
          '<p class="quote-work">' + esc(q.work) + '</p>' +
          '<blockquote>' + esc(q.quote) + '</blockquote>' +
          '<p class="quote-author">' + esc(q.author) + '</p>' +
        '</div>' +
        '<div class="quote-img-side">' +
          '<figure class="quote-photo' + zoomCls + '">' +
            '<img src="' + esc(q.img) + '" alt="' + esc(q.alt) + '" loading="lazy" onerror="this.style.display=\'none\'">' +
            '<div class="photo-overlay"></div>' +
            '<figcaption class="quote-photo-label">' + esc(q.caption) + '</figcaption>' +
          '</figure>' +
        '</div>' +
      '</div>';
  }).join('');
  const dots = (DATA.quotes || []).map(function (q, i) {
    return '<button class="quote-dot' + (i === 0 ? ' active' : '') + '" data-index="' + i + '" aria-label="Citação ' + (i + 1) + '"></button>';
  }).join('');
  return { slides: slides, dots: dots };
}

function buildIndica() {
  return (DATA.indica || []).map(function (c) {
    const inner = '' +
      '<figure class="indica-thumb ' + esc(c.thumbClass || 'indica-thumb-verde') + '">' +
        '<span class="indica-thumb-text">' + c.thumbText + '</span>' +
      '</figure>' +
      '<div>' +
        '<p class="indica-card-tag">' + esc(c.tag) + '</p>' +
        '<p class="indica-card-title">' + esc(c.title) + '</p>' +
        '<p class="indica-card-author">' + esc(c.author) + '</p>' +
        '<p class="indica-card-text">' + esc(c.text) + '</p>' +
      '</div>';
    if (c.link && c.link !== '#') {
      return '<a class="indica-card" href="' + esc(c.link) + '" target="_blank" rel="noopener">' + inner + '</a>';
    }
    return '<article class="indica-card">' + inner + '</article>';
  }).join('');
}

function buildTextos() {
  return (DATA.textos || []).map(function (t) {
    return '<li><a href="' + esc(t.href) + '">' + esc(t.title) + '</a></li>';
  }).join('');
}

function buildLinks() {
  return (DATA.links || []).map(function (l) {
    const isSoon = l.soon || !l.href || l.href === '#';
    const href = isSoon ? '#' : l.href;
    const cls = isSoon ? 'link-item js-soon' : 'link-item';
    const ext = isSoon ? '' : ' target="_blank" rel="noopener"';
    const icon = ICONS[l.icon] || ICONS.site;
    return '<a href="' + href + '" class="' + cls + '"' + ext + '>' + icon + '<span class="link-label">' + esc(l.label) + '</span></a>';
  }).join('');
}

/* ---- Gera index.html ---------------------------------------------------- */
const tplIndex = fs.readFileSync(path.join(__dirname, 'templates', 'index.html'), 'utf8');
const q = buildQuotes();
const outIndex = tplIndex
  .replace('@@VOZ@@', buildVoz())
  .replace('@@QUOTES@@', q.slides)
  .replace('@@QUOTE_DOTS@@', q.dots)
  .replace('@@INDICA@@', buildIndica())
  .replace('@@TEXTOS@@', buildTextos());
fs.writeFileSync(path.join(__dirname, 'index.html'), outIndex, 'utf8');

/* ---- Gera links.html --------------------------------------------------- */
const tplLinks = fs.readFileSync(path.join(__dirname, 'templates', 'links.html'), 'utf8');
const outLinks = tplLinks.replace('@@LINKS@@', buildLinks());
fs.writeFileSync(path.join(__dirname, 'links.html'), outLinks, 'utf8');

console.log('Build concluído: index.html e links.html gerados a partir de content.js');
