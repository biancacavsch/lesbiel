/* Progress bar */
const progressBar = document.createElement('div');
progressBar.className = 'progress-bar';
document.body.appendChild(progressBar);

window.addEventListener('scroll', () => {
  const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  const scrolled = (window.scrollY / windowHeight) * 100;
  progressBar.style.width = scrolled + '%';
});

/* Smooth scroll para âncoras internas */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
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

/* Navegação por teclado (foco visível) */
document.addEventListener('keydown', (e) => {
  if (e.key === 'Tab') document.body.classList.add('keyboard-nav');
});
document.addEventListener('mousedown', () => {
  document.body.classList.remove('keyboard-nav');
});

/* Revelar o hero ao carregar */
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.hero-content').forEach(el => {
    el.style.opacity = '1';
    el.style.transform = 'translateY(0)';
  });
});
