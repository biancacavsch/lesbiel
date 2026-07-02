const progressBar = document.createElement('div');
progressBar.className = 'progress-bar';
document.body.appendChild(progressBar);

window.addEventListener('scroll', () => {
  const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  const scrolled = (window.scrollY / windowHeight) * 100;
  progressBar.style.width = scrolled + '%';
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    const href = this.getAttribute('href');
    if (href === '#' || this.classList.contains('js-soon')) return;
    e.preventDefault();
    const target = document.querySelector(href);
    if (!target) return;
    window.scrollTo({
      top: target.getBoundingClientRect().top + window.scrollY - 20,
      behavior: 'smooth'
    });
  });
});

/* ── Texto: switching between texts ── */

const textoTocLinks = document.querySelectorAll('.texto-toc a');
const textoContents = document.querySelectorAll('.texto-content');

function showTexto(id) {
  textoContents.forEach(el => {
    el.style.display = el.id === id ? 'block' : 'none';
  });
  textoTocLinks.forEach(link => {
    link.classList.toggle('active', link.getAttribute('href') === '#' + id);
  });
}

textoTocLinks.forEach(link => {
  link.addEventListener('click', function(e) {
    const href = this.getAttribute('href');
    if (href && href.startsWith('#')) {
      e.preventDefault();
      showTexto(href.substring(1));
      document.querySelector('#texto').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

/* ── Archive cards: link to text sections ── */

document.querySelectorAll('.arquivo-card .card-link').forEach(link => {
  link.addEventListener('click', function(e) {
    const href = this.getAttribute('href');
    if (href && href.startsWith('#')) {
      e.preventDefault();
      showTexto(href.substring(1));
      document.querySelector('#texto').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

/* ── Scroll animations ── */

const animateOnScroll = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }, 100);
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.arquivo-card, .indica-card').forEach(el => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(24px)';
  el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  animateOnScroll.observe(el);
});

document.querySelectorAll('.section-label, .indica-header h2').forEach(el => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(16px)';
  el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  animateOnScroll.observe(el);
});

/* ── Modal "Em breve" ── */

let modal = null;

function closeModal() {
  if (modal) {
    modal.remove();
    modal = null;
  }
}

document.querySelectorAll('.js-soon').forEach(btn => {
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    closeModal();

    modal = document.createElement('div');
    modal.className = 'modal-overlay';

    const content = document.createElement('div');
    content.className = 'modal-content';

    const closeBtn = document.createElement('button');
    closeBtn.className = 'modal-close';
    closeBtn.textContent = '\u00d7';
    closeBtn.addEventListener('click', closeModal);

    const title = document.createElement('h3');
    title.className = 'modal-title';
    title.textContent = 'Em breve';

    const desc = document.createElement('p');
    desc.className = 'modal-desc';
    desc.textContent = 'Este conte\u00fado estar\u00e1 dispon\u00edvel em breve.';

    content.appendChild(closeBtn);
    content.appendChild(title);
    content.appendChild(desc);
    modal.appendChild(content);
    document.body.appendChild(modal);

    modal.addEventListener('click', (e) => {
      if (e.target === modal) closeModal();
    });

    const escapeHandler = (e) => {
      if (e.key === 'Escape') {
        closeModal();
        document.removeEventListener('keydown', escapeHandler);
      }
    };
    document.addEventListener('keydown', escapeHandler);
  });
});

/* ── Card hover effect ── */

document.querySelectorAll('.arquivo-card, .indica-card').forEach(card => {
  card.addEventListener('mousemove', (e) => {
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;
    const moveX = (x - centerX) / 20;
    const moveY = (y - centerY) / 20;
    card.style.transform = 'perspective(1000px) rotateX(' + (-moveY * 0.5) + 'deg) rotateY(' + (moveX * 0.5) + 'deg) translateY(0)';
  });
  card.addEventListener('mouseleave', () => {
    card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
  });
});

/* ── Keyboard nav ── */

document.addEventListener('keydown', (e) => {
  if (e.key === 'Tab') {
    document.body.classList.add('keyboard-nav');
  }
});
document.addEventListener('mousedown', () => {
  document.body.classList.remove('keyboard-nav');
});

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.hero-content').forEach(el => {
    el.style.opacity = '1';
    el.style.transform = 'translateY(0)';
  });
});

/* ── Quote carousel ── */

const quoteSlides = document.querySelectorAll('.quote-slide');
const quoteDots = document.querySelectorAll('.quote-dot');
let quoteCurrent = 0;
let quoteTimer = null;

function showQuote(index) {
  quoteSlides.forEach(s => s.classList.remove('active'));
  quoteDots.forEach(d => d.classList.remove('active'));
  quoteSlides[index].classList.add('active');
  quoteDots[index].classList.add('active');
  quoteCurrent = index;
}

function nextQuote() {
  showQuote((quoteCurrent + 1) % quoteSlides.length);
}

quoteDots.forEach(dot => {
  dot.addEventListener('click', () => {
    clearInterval(quoteTimer);
    showQuote(parseInt(dot.dataset.index));
    quoteTimer = setInterval(nextQuote, 10000);
  });
});

if (quoteSlides.length > 1) {
  quoteTimer = setInterval(nextQuote, 6000);
}
