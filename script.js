// ============================================
// SCROLL PROGRESS INDICATOR
// ============================================
const progressBar = document.createElement('div');
progressBar.style.cssText = `
  position: fixed;
  top: 0;
  left: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--verde-light), var(--verde-mid));
  z-index: 1000;
  transition: width 0.1s ease;
  width: 0%;
`;
document.body.appendChild(progressBar);

window.addEventListener('scroll', () => {
  const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  const scrolled = (window.scrollY / windowHeight) * 100;
  progressBar.style.width = scrolled + '%';
});

// ============================================
// SMOOTH SCROLL WITH OFFSET
// ============================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    const href = this.getAttribute('href');
    if (href === '#') return;
    
    e.preventDefault();
    const target = document.querySelector(href);
    if (!target) return;

    window.scrollTo({
      top: target.getBoundingClientRect().top + window.scrollY - 20,
      behavior: 'smooth'
    });
  });
});

// ============================================
// MOBILE RESPONSIVE STYLES
// ============================================
const mobileStyles = document.createElement('style');
mobileStyles.textContent = `
  @media (max-width: 768px) {
    .hero { padding: 4rem 1.5rem 3rem; }
    
    .hero-title-row {
      flex-direction: column;
      gap: 1.5rem;
      align-items: flex-start;
    }
    
    .hero-main-title {
      font-size: 3rem;
    }
    
    .hero-subtitle {
      font-size: 0.9rem;
      max-width: 300px;
      text-align: left;
    }
    
    .hero-links {
      flex-direction: column;
    }
    
    .hero-link {
      border-right: none !important;
      border-bottom: 1px solid rgba(233,242,221,0.3);
    }
    
    .hero-link:last-child {
      border-bottom: none;
    }
    
    .arquivo, .indica-section, .texto-section, .sobre-section { padding: 4rem 1.5rem; }
    .quote-section { grid-template-columns: 1fr; gap: 3rem; padding: 4rem 1.5rem; }
    .texto-section { grid-template-columns: 1fr; gap: 3rem; }
    .sobre-section { grid-template-columns: 1fr; gap: 3rem; }
    .arquivo-grid { grid-template-columns: 1fr; }
    .indica-grid { grid-template-columns: 1fr; }
  }
`;
document.head.appendChild(mobileStyles);

// ============================================
// TABLE OF CONTENTS SCROLL SPY
// ============================================
const textoSections = document.querySelectorAll('.texto-body p');
const tocLinks = document.querySelectorAll('.texto-toc a');

// Add IDs to text paragraphs for TOC navigation
const textIds = ['bliss-intro', 'bliss-feeling', 'bliss-question', 'bliss-key'];
textoSections.forEach((p, i) => {
  if (textIds[i]) {
    p.id = textIds[i];
  }
});

// Update TOC active state on scroll
const textObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const id = entry.target.id;
      tocLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${id}` || 
            (id && link.textContent.toLowerCase().includes(id.replace('bliss-', '')))) {
          link.classList.add('active');
        }
      });
    }
  });
}, { threshold: 0.5 });

textoSections.forEach(p => textObserver.observe(p));

// ============================================
// ENHANCED CARD ANIMATIONS
// ============================================
const animateOnScroll = new IntersectionObserver((entries) => {
  entries.forEach((entry, index) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }, index * 100); // Stagger effect
    }
  });
}, { threshold: 0.1 });

// Apply to all cards
document.querySelectorAll('.arquivo-card, .indica-card').forEach(el => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(24px)';
  el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  animateOnScroll.observe(el);
});

// Apply to section headers
document.querySelectorAll('.section-label, .indica-header h2').forEach(el => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(16px)';
  el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  animateOnScroll.observe(el);
});

// ============================================
// AUDIO PLAYER MODAL (SIMULATION)
// ============================================
let audioModal = null;

document.querySelectorAll('.card-link, .audio-pill').forEach(btn => {
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    
    // Remove existing modal
    if (audioModal) {
      audioModal.remove();
    }

    // Create modal
    audioModal = document.createElement('div');
    audioModal.style.cssText = `
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(10,10,10,0.9);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      animation: fadeIn 0.3s ease;
    `;

    const modalContent = document.createElement('div');
    modalContent.style.cssText = `
      background: var(--verde);
      padding: 3rem;
      border-radius: 4px;
      max-width: 400px;
      width: 90%;
      text-align: center;
      position: relative;
    `;

    const closeBtn = document.createElement('button');
    closeBtn.textContent = '×';
    closeBtn.style.cssText = `
      position: absolute;
      top: 1rem;
      right: 1.5rem;
      background: none;
      border: none;
      color: var(--bege);
      font-size: 2rem;
      cursor: pointer;
      opacity: 0.6;
      transition: opacity 0.2s;
    `;
    closeBtn.addEventListener('mouseenter', () => closeBtn.style.opacity = '1');
    closeBtn.addEventListener('mouseleave', () => closeBtn.style.opacity = '0.6');
    closeBtn.addEventListener('click', () => audioModal.remove());

    const title = document.createElement('h3');
    title.style.cssText = `
      font-size: 1.5rem;
      color: var(--bege);
      margin-bottom: 0.5rem;
      letter-spacing: -0.03em;
    `;
    title.textContent = 'Em breve';

    const desc = document.createElement('p');
    desc.style.cssText = `
      color: var(--bege);
      opacity: 0.7;
      font-size: 0.9rem;
      line-height: 1.6;
      margin-bottom: 2rem;
    `;
    desc.textContent = 'Os áudios estarão disponíveis no Spotify em breve. Inscreva-se para ser notificado.';

    const notifyBtn = document.createElement('button');
    notifyBtn.textContent = 'Notificar-me';
    notifyBtn.style.cssText = `
      background: var(--bege);
      color: var(--verde);
      border: none;
      padding: 0.8rem 2rem;
      font-size: 0.85rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      cursor: pointer;
      transition: transform 0.2s, opacity 0.2s;
    `;
    notifyBtn.addEventListener('mouseenter', () => {
      notifyBtn.style.transform = 'translateY(-2px)';
      notifyBtn.style.opacity = '0.9';
    });
    notifyBtn.addEventListener('mouseleave', () => {
      notifyBtn.style.transform = 'translateY(0)';
      notifyBtn.style.opacity = '1';
    });
    notifyBtn.addEventListener('click', () => {
      notifyBtn.textContent = 'Inscrito! ✓';
      notifyBtn.style.pointerEvents = 'none';
      setTimeout(() => audioModal.remove(), 1500);
    });

    modalContent.appendChild(closeBtn);
    modalContent.appendChild(title);
    modalContent.appendChild(desc);
    modalContent.appendChild(notifyBtn);
    audioModal.appendChild(modalContent);
    document.body.appendChild(audioModal);

    // Close on background click
    audioModal.addEventListener('click', (e) => {
      if (e.target === audioModal) {
        audioModal.remove();
      }
    });

    // Close on escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && audioModal) {
        audioModal.remove();
      }
    });
  });
});

// Add fadeIn animation
const styleSheet = document.createElement('style');
styleSheet.textContent = `
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }
`;
document.head.appendChild(styleSheet);

// ============================================
// PARALLAX EFFECT FOR HERO BACKGROUND
// ============================================
const heroBgText = document.querySelector('.hero-bg-text');
if (heroBgText) {
  window.addEventListener('scroll', () => {
    const scrolled = window.scrollY;
    if (scrolled < window.innerHeight) {
      heroBgText.style.transform = `translate(-50%, calc(-50% + ${scrolled * 0.3}px))`;
      heroBgText.style.opacity = 1 - (scrolled / window.innerHeight);
    }
  });
}

// ============================================
// MAGNETIC BUTTON EFFECT FOR CARDS
// ============================================
document.querySelectorAll('.arquivo-card, .indica-card').forEach(card => {
  card.addEventListener('mousemove', (e) => {
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;
    
    const moveX = (x - centerX) / 20;
    const moveY = (y - centerY) / 20;
    
    card.style.transform = `perspective(1000px) rotateX(${-moveY * 0.5}deg) rotateY(${moveX * 0.5}deg) translateY(0)`;
  });
  
  card.addEventListener('mouseleave', () => {
    card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
  });
});

// ============================================
// KEYBOARD NAVIGATION
// ============================================
document.addEventListener('keydown', (e) => {
  // Tab navigation enhancement
  if (e.key === 'Tab') {
    document.body.classList.add('keyboard-nav');
  }
});

document.addEventListener('mousedown', () => {
  document.body.classList.remove('keyboard-nav');
});

// Add keyboard navigation styles
const keyboardStyles = document.createElement('style');
keyboardStyles.textContent = `
  .keyboard-nav *:focus {
    outline: 2px solid var(--verde-light);
    outline-offset: 2px;
  }
  
  .arquivo-card:focus-within,
  .indica-card:focus-within {
    box-shadow: 0 0 0 2px var(--verde-light);
  }
`;
document.head.appendChild(keyboardStyles);

// ============================================
// LAZY LOADING FOR IMAGES
// ============================================
document.querySelectorAll('img').forEach(img => {
  img.setAttribute('loading', 'lazy');
});

// ============================================
// INITIALIZE
// ============================================
document.addEventListener('DOMContentLoaded', () => {
  // Trigger initial animations
  document.querySelectorAll('.hero-content').forEach(el => {
    el.style.opacity = '1';
    el.style.transform = 'translateY(0)';
  });
});