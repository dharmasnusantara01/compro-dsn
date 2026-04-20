// Fade-up on scroll
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) entry.target.classList.add('visible');
    });
}, { threshold: 0.1 });

document.querySelectorAll('.fade-up').forEach((el) => observer.observe(el));

// Mobile nav
const navToggle = document.getElementById('nav-toggle');
const navMenu = document.getElementById('nav-menu');
if (navToggle && navMenu) {
    navToggle.addEventListener('click', () => navMenu.classList.toggle('hidden'));
}

// Sticky nav shadow
const nav = document.getElementById('main-nav');
if (nav) {
    window.addEventListener('scroll', () => nav.classList.toggle('shadow-md', window.scrollY > 20));
}
