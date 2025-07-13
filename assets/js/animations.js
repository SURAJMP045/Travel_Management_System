// Scroll Animation JavaScript
document.addEventListener('DOMContentLoaded', function () {
  // Add scroll animation classes to elements
  const elementsToAnimate = [
    '.destination h1',
    '.pictures',
    '.pictures1',
    '.test-card',
    '.sponsor__content',
    '.featured-destinations h1',
    '.destination-grid',
    '.destination-card',
    '.about h1',
    '.about p',
    '.container',
    '.admin-panel',
    '.glassy-effect'
  ];

  // Add scroll-animate class to elements
  elementsToAnimate.forEach(selector => {
    const elements = document.querySelectorAll(selector);
    elements.forEach(element => {
      element.classList.add('scroll-animate');
    });
  });

  // Intersection Observer for scroll animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate');
      }
    });
  }, observerOptions);

  // Observe all scroll-animate elements
  const scrollElements = document.querySelectorAll('.scroll-animate');
  scrollElements.forEach(element => {
    observer.observe(element);
  });

  // Add staggered animation delay for cards
  const cards = document.querySelectorAll('.test-card, .destination-card');
  cards.forEach((card, index) => {
    card.style.animationDelay = `${index * 0.1}s`;
  });

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // Add hover animations
  const interactiveElements = document.querySelectorAll('.test-card, .destination-card, .sponsor__content');
  interactiveElements.forEach(element => {
    element.addEventListener('mouseenter', function () {
      this.style.transform = 'translateY(-10px) scale(1.02)';
      this.style.transition = 'all 0.3s ease';
    });

    element.addEventListener('mouseleave', function () {
      this.style.transform = 'translateY(0) scale(1)';
    });
  });

  // Page load animation
  window.addEventListener('load', function () {
    document.body.classList.add('loaded');

    // Animate elements with delay
    const animatedElements = document.querySelectorAll('.fade-in-up, .slide-in-left, .slide-in-right, .scale-in');
    animatedElements.forEach((element, index) => {
      element.style.animationDelay = `${index * 0.2}s`;
    });
  });
});

// Add CSS for page load animation
const style = document.createElement('style');
style.textContent = `
    .loaded {
        animation: fadeInUp 0.8s ease-out;
    }
    
    .test-card:hover,
    .destination-card:hover,
    .sponsor__content:hover {
        transform: translateY(-10px) scale(1.02) !important;
        box-shadow: 0 15px 30px rgba(0,0,0,0.2) !important;
    }
`;
document.head.appendChild(style); 