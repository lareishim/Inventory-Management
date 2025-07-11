function animateCounter(element, target, duration = 2000) {
  const start = 0;
  const increment = target / (duration / 16); // 60fps
  let current = start;

  const timer = setInterval(() => {
    current += increment;
    if (current >= target) {
      current = target;
      clearInterval(timer);
    }

    let displayValue;
    if (target >= 1000) {
      displayValue = Math.floor(current).toLocaleString();
      const originalText = element.getAttribute('data-target');
      if (originalText.includes('+')) {
        displayValue += '+';
      } else if (originalText.includes('%')) {
        displayValue += '%';
      }
    } else {
      displayValue = Math.floor(current);

      const originalText = element.getAttribute('data-target');
      if (originalText.includes('/')) {
        displayValue += '/7';
      }
    }

    element.textContent = displayValue;
  }, 16);
}

function startStatsAnimation() {
  const statNumbers = document.querySelectorAll('.stat-number');

  statNumbers.forEach(stat => {
    const targetText = stat.textContent;
    const targetNumber = parseInt(targetText.replace(/[^\d]/g, ''));

    stat.setAttribute('data-target', targetText);
    stat.textContent = '0';

    setTimeout(() => {
      animateCounter(stat, targetNumber);
    }, Math.random() * 200);
  });
}

function initStatsObserver() {
  const statsSection = document.querySelector('.stats');

  if (!statsSection) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        startStatsAnimation();
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.5
  });

  observer.observe(statsSection);
}

document.addEventListener('DOMContentLoaded', () => {
  initStatsObserver();

  // Contact form handler
  const contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      alert('Thank you for contacting us! We will get back to you soon.');
      contactForm.reset();
    });
  }
});
