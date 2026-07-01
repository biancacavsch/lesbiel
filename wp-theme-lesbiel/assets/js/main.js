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

const textoSections = document.querySelectorAll('.texto-body p');
const tocLinks = document.querySelectorAll('.texto-toc a');
const textIds = ['bliss-intro', 'bliss-feeling', 'bliss-question', 'bliss-key'];
textoSections.forEach((p, i) => {
  if (textIds[i]) p.id = textIds[i];
});

const textObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const id = entry.target.id;
      tocLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + id) {
          link.classList.add('active');
        }
      });
    }
  });
}, { threshold: 0.5 });
textoSections.forEach(p => textObserver.observe(p));

const animateOnScroll = new IntersectionObserver((entries) => {
  entries.forEach((entry, index) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }, index * 100);
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

document.querySelectorAll('.arquivo-card').forEach(card => {
  card.addEventListener('click', function(e) {
    if (e.target.closest('a')) return;
    const soonLink = this.querySelector('.js-soon');
    if (soonLink) soonLink.click();
  });
});

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
