document.addEventListener('DOMContentLoaded', () => {
    const burgerButton = document.getElementById('burgerButton');
    const mobileMenu = document.getElementById('mobileMenu');
    const navMenu = document.getElementById('navMenu');

    // Toggle mobile menu visibility on burger button click
    burgerButton.addEventListener('click', () => {
        // Only toggle mobile menu when burger button is clicked
        mobileMenu.classList.toggle('hidden');

        // Ensure desktop menu is hidden when the mobile menu is shown
        navMenu.classList.add('hidden');
    });

    // Hide mobile menu when any link is clicked, without affecting desktop menu
    const mobileLinks = mobileMenu.querySelectorAll('a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            // Hide mobile menu and leave desktop menu as is
            mobileMenu.classList.add('hidden');
        });
    });

    // Smooth scroll functionality for anchor links
    const links = document.querySelectorAll('a[href^="#"]');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();  // Prevent default link behavior
            const targetId = this.getAttribute('href').substring(1);  // Get the section ID
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 50, // Adjust for header height
                    behavior: 'smooth'
                });
            }
        });
    });

    // Optional: Close the mobile menu and keep the desktop menu visible when clicking outside the menu
    document.addEventListener('click', (e) => {
        // Only close the mobile menu if the click is outside the mobile menu and burger button
        if (!mobileMenu.contains(e.target) && !burgerButton.contains(e.target)) {
            mobileMenu.classList.add('hidden');  // Close mobile menu
        }
    });
});
