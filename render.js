/*
 * render.js — monta as seções dinâmicas do site a partir de window.LESBIEL.
 * Carregado após content.js. Cuida também do carrossel, animações, hover e modal.
 */
(function () {
  const DATA = window.LESBIEL || {};

  const ICONS = {
    site: '<svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>',
    spotify: '<svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M7 9c4-1 8-0.5 11 1.5M7.5 12.5c3.5-0.8 6.5-0.4 9 1M8 15.5c3-0.6 5.2-0.3 7 0.8"/></svg>',
    instagram: '<svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>',
    form: '<svg class="link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>'
  };

  const ARROW = '<svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M2 10L10 2M10 2H4M10 2V8"/></svg>';

  function esc(s) {
    return String(s == null ? '' : s);
  }

  /* ---------- VOZ ---------- */
  function renderVoz() {
    const grid = document.getElementById('voz-grid');
    if (!grid || !DATA.voz) return;
    if (grid.children.length) return; /* já está no HTML estático (build) */
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
    grid.innerHTML = DATA.voz.map(vozCard).join('');
  }

  /* ---------- CARROSSEL DE CITAÇÕES ---------- */
  function renderQuotes() {
    const carousel = document.getElementById('quote-carousel');
    const dots = document.getElementById('quote-dots');
    if (!carousel || !DATA.quotes) return;
    if (!carousel.children.length) { /* só monta se não veio do build estático */
      carousel.innerHTML = DATA.quotes.map(function (q, i) {
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
      if (dots) {
        dots.innerHTML = DATA.quotes.map(function (q, i) {
          return '<button class="quote-dot' + (i === 0 ? ' active' : '') + '" data-index="' + i + '" aria-label="Citação ' + (i + 1) + '"></button>';
        }).join('');
      }
    }
    initCarousel();
  }

  function initCarousel() {
    const slides = document.querySelectorAll('.quote-slide');
    const dots = document.querySelectorAll('.quote-dot');
    if (!slides.length) return;
    let current = 0;
    let timer = null;

    function show(index) {
      slides.forEach(function (s) { s.classList.remove('active'); });
      dots.forEach(function (d) { d.classList.remove('active'); });
      slides[index].classList.add('active');
      if (dots[index]) dots[index].classList.add('active');
      current = index;
    }
    function next() { show((current + 1) % slides.length); }

    dots.forEach(function (dot) {
      dot.addEventListener('click', function () {
        clearInterval(timer);
        show(parseInt(dot.dataset.index, 10));
        timer = setInterval(next, 10000);
      });
    });
    if (slides.length > 1) timer = setInterval(next, 6000);
  }

  /* ---------- LESBIEL INDICA ---------- */
  function renderIndica() {
    const grid = document.getElementById('indica-grid');
    if (!grid || !DATA.indica) return;
    if (grid.children.length) return; /* já está no HTML estático (build) */
    grid.innerHTML = DATA.indica.map(function (c) {
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

  /* ---------- TEXTO (lista) ---------- */
  function renderTextos() {
    const list = document.getElementById('texto-list');
    if (!list || !DATA.textos) return;
    if (list.children.length) return; /* já está no HTML estático (build) */
    list.innerHTML = DATA.textos.map(function (t) {
      return '<li><a href="' + esc(t.href) + '">' + esc(t.title) + '</a></li>';
    }).join('');
  }

  /* ---------- LINKS (linktree) ---------- */
  function renderLinks() {
    const list = document.getElementById('links-list');
    if (!list || !DATA.links) return;
    if (list.children.length) return; /* já está no HTML estático (build) */
    list.innerHTML = DATA.links.map(function (l) {
      const isSoon = l.soon || !l.href || l.href === '#';
      const href = isSoon ? '#' : l.href;
      const cls = isSoon ? 'link-item js-soon' : 'link-item';
      const ext = isSoon ? '' : ' target="_blank" rel="noopener"';
      const icon = ICONS[l.icon] || ICONS.site;
      return '<a href="' + href + '" class="' + cls + '"' + ext + '>' + icon + '<span class="link-label">' + esc(l.label) + '</span></a>';
    }).join('');
  }

  /* ---------- Animações ao rolar ---------- */
  function initScrollAnimations() {
    if (!('IntersectionObserver' in window)) return;
    const obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          setTimeout(function () {
            e.target.style.opacity = '1';
            e.target.style.transform = 'translateY(0)';
          }, 100);
        }
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('.arquivo-card, .indica-card').forEach(function (el) {
      el.style.opacity = '0';
      el.style.transform = 'translateY(24px)';
      el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      obs.observe(el);
    });
    document.querySelectorAll('.section-label, .indica-header h2').forEach(function (el) {
      el.style.opacity = '0';
      el.style.transform = 'translateY(16px)';
      el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      obs.observe(el);
    });
  }

  /* ---------- Efeito de hover 3D nos cards ---------- */
  function initCardHover() {
    document.querySelectorAll('.arquivo-card, .indica-card').forEach(function (card) {
      card.addEventListener('mousemove', function (e) {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const moveX = (x - rect.width / 2) / 20;
        const moveY = (y - rect.height / 2) / 20;
        card.style.transform = 'perspective(1000px) rotateX(' + (-moveY * 0.5) + 'deg) rotateY(' + (moveX * 0.5) + 'deg) translateY(0)';
      });
      card.addEventListener('mouseleave', function () {
        card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
      });
    });
  }

  /* ---------- Modal "Em breve" (delegação de evento) ---------- */
  function initModal() {
    let modal = null;
    function close() { if (modal) { modal.remove(); modal = null; } }
    function open() {
      if (modal) return;
      modal = document.createElement('div');
      modal.className = 'modal-overlay';
      const content = document.createElement('div');
      content.className = 'modal-content';
      content.innerHTML = '<button class="modal-close" aria-label="Fechar">&times;</button><h3 class="modal-title">Em breve</h3><p class="modal-desc">Este conteúdo estará disponível em breve.</p>';
      modal.appendChild(content);
      document.body.appendChild(modal);
      content.querySelector('.modal-close').addEventListener('click', close);
      modal.addEventListener('click', function (ev) { if (ev.target === modal) close(); });
    }
    document.addEventListener('click', function (e) {
      const btn = e.target.closest('.js-soon');
      if (!btn) return;
      e.preventDefault();
      open();
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal) { close(); return; }
      if (e.key === 'Enter' || e.key === ' ' || e.key === 'Spacebar') {
        const el = document.activeElement;
        if (el && el.classList && el.classList.contains('js-soon')) {
          e.preventDefault();
          open();
        }
      }
    });
  }

  /* ---------- Inicializa tudo ---------- */
  function init() {
    renderVoz();
    renderQuotes();
    renderIndica();
    renderTextos();
    renderLinks();
    initScrollAnimations();
    initCardHover();
    initModal();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
