import './word-counter'


// sidebar 
document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.querySelector('#sidebar');
    const hamburgers = document.querySelectorAll('.hamburger');
    const desktopIcons = document.querySelectorAll('.desktop-icon');

    function updateIcons() {
        desktopIcons.forEach(icon => {
            if (sidebar.classList.contains('locked')) {
                icon.classList.replace('fa-lock-open', 'fa-lock');
            } else {
                icon.classList.replace('fa-lock', 'fa-lock-open');
            }
        });
    }

    // ✅ Click for Toggle (All Hamburger Buttons Work)
    hamburgers.forEach((hamburger) => {
        hamburger.addEventListener('click', () => {
            if (window.innerWidth >= 1025) {
                sidebar.classList.toggle('locked');

                if (sidebar.classList.contains('locked')) {
                    sidebar.classList.add('expanded'); // Lock = Expand
                } else {
                    sidebar.classList.remove('expanded'); // Unlock = Collapse
                }
            } else {
                sidebar.classList.toggle('open'); // Mobile Open/Close
            }

            updateIcons();
        });
    });

    // ✅ Hover Effect (Only if NOT Locked)
    sidebar.addEventListener('mouseenter', () => {
        if (window.innerWidth >= 1025 && !sidebar.classList.contains('locked')) {
            sidebar.classList.add('expanded');
        }
    });

    sidebar.addEventListener('mouseleave', () => {
        if (window.innerWidth >= 1025 && !sidebar.classList.contains('locked')) {
            sidebar.classList.remove('expanded');
        }
    });

    // ✅ Update Icons on Resize
    window.addEventListener('resize', updateIcons);
    updateIcons();
});