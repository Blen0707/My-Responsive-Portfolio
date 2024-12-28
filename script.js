const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav-links');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});


document.addEventListener('DOMContentLoaded', () => {
    // Select the sections to animate
    const aboutSection = document.getElementById('about');
    const experienceSection = document.getElementById('experience');

    // Add the 'visible' class with a delay for staggered animation
    setTimeout(() => {
        aboutSection.classList.add('visible');
    }, 500); // 500ms delay for About section

    setTimeout(() => {
        experienceSection.classList.add('visible');
    }, 1000); // 1000ms delay for Experience section
});
