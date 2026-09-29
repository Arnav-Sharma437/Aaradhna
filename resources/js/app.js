import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    initMegaMenu();
    initMobileDrawer();
    initSearchModal();
    initCartBadge();
});

/**
 * 1. Mega Menu Desktop Interaction
 */
function initMegaMenu() {
    const navItem = document.getElementById('pooja-shop-nav-item');
    const megaMenu = document.getElementById('pooja-shop-mega-menu');
    const toggle = document.getElementById('pooja-shop-toggle');

    if (!navItem || !megaMenu) return;

    let timeoutId;

    const showMenu = () => {
        clearTimeout(timeoutId);
        megaMenu.classList.remove('invisible', 'opacity-0', 'translate-y-2', 'pointer-events-none');
        megaMenu.classList.add('opacity-100', 'translate-y-0');
        if (toggle) toggle.setAttribute('aria-expanded', 'true');
    };

    const hideMenu = () => {
        timeoutId = setTimeout(() => {
            megaMenu.classList.add('invisible', 'opacity-0', 'translate-y-2', 'pointer-events-none');
            megaMenu.classList.remove('opacity-100', 'translate-y-0');
            if (toggle) toggle.setAttribute('aria-expanded', 'false');
        }, 150);
    };

    navItem.addEventListener('mouseenter', showMenu);
    navItem.addEventListener('mouseleave', hideMenu);
    megaMenu.addEventListener('mouseenter', showMenu);
    megaMenu.addEventListener('mouseleave', hideMenu);
}

/**
 * 2. Mobile Drawer Navigation
 */
function initMobileDrawer() {
    const trigger = document.getElementById('mobile-menu-trigger');
    const drawer = document.getElementById('mobile-drawer');
    const overlay = document.getElementById('mobile-drawer-overlay');
    const closeBtn = document.getElementById('mobile-drawer-close');

    if (!trigger || !drawer || !overlay) return;

    const openDrawer = () => {
        drawer.classList.remove('-translate-x-full');
        drawer.classList.add('translate-x-0');
        overlay.classList.remove('opacity-0', 'pointer-events-none');
        overlay.classList.add('opacity-100');
        document.body.classList.add('overflow-hidden');
    };

    const closeDrawer = () => {
        drawer.classList.add('-translate-x-full');
        drawer.classList.remove('translate-x-0');
        overlay.classList.add('opacity-0', 'pointer-events-none');
        overlay.classList.remove('opacity-100');
        document.body.classList.remove('overflow-hidden');
    };

    trigger.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);

    // Mobile Accordion functionality
    const accordionToggles = document.querySelectorAll('.mobile-accordion-toggle');
    accordionToggles.forEach(btn => {
        btn.addEventListener('click', () => {
            const content = btn.nextElementSibling;
            const icon = btn.querySelector('svg');
            const isExpanded = btn.getAttribute('aria-expanded') === 'true';

            if (content) {
                content.classList.toggle('hidden');
                btn.setAttribute('aria-expanded', !isExpanded);
                if (icon) {
                    icon.classList.toggle('rotate-180', !isExpanded);
                }
            }
        });
    });
}

/**
 * 3. Predictive Search Modal
 */
function initSearchModal() {
    const trigger = document.getElementById('search-modal-trigger');
    const modal = document.getElementById('search-modal');
    const backdrop = document.getElementById('search-modal-backdrop');
    const closeBtn = document.getElementById('search-modal-close');
    const input = document.getElementById('predictive-search-input');

    if (!modal) return;

    const openModal = () => {
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100');
        document.body.classList.add('overflow-hidden');
        if (input) {
            setTimeout(() => input.focus(), 100);
        }
    };

    const closeModal = () => {
        modal.classList.add('opacity-0', 'pointer-events-none');
        modal.classList.remove('opacity-100');
        document.body.classList.remove('overflow-hidden');
    };

    if (trigger) trigger.addEventListener('click', openModal);
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (backdrop) backdrop.addEventListener('click', closeModal);

    // Escape key closes modal or mobile drawer
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (!modal.classList.contains('pointer-events-none')) {
                closeModal();
            }
        }
    });

    // Quick tag clicks populate search input
    const tags = document.querySelectorAll('.search-tag');
    tags.forEach(tag => {
        tag.addEventListener('click', () => {
            if (input) {
                input.value = tag.textContent.trim();
                input.focus();
            }
        });
    });
}

/**
 * 4. Cart Badge Initialization
 */
function initCartBadge() {
    const badge = document.getElementById('header-cart-badge');
    if (!badge) return;

    // Listen to potential global cart events
    window.addEventListener('cart:updated', (event) => {
        if (event.detail && typeof event.detail.count !== 'undefined') {
            badge.textContent = event.detail.count;
            badge.classList.remove('hidden');
        }
    });
}
